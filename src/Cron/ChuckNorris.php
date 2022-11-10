<?php declare(strict_types=1);

namespace RichardParnabyKing\PixieMediaTest\Cron;

class ChuckNorris
{
    protected $curl;
    protected $apiFactory;
    protected $apiCollection;
    
    public function __construct(
        \Magento\Framework\HTTP\Client\Curl $curl,
        \RichardParnabyKing\PixieMediaTest\Model\ApiFactory $apiFactory,
        \RichardParnabyKing\PixieMediaTest\Model\ResourceModel\Api\CollectionFactory $apiCollection
    ) {
        $this->curl = $curl;
        $this->apiFactory = $apiFactory;
        $this->apiCollection = $apiCollection;
    }
    
    public function fetch() {
        
        //Send request to get most recent data. Hard-coded api endpoint here but
        // would usually set the api endpoint as admin config editable. I think
        // that's not required for this test.
        $this->curl->get('https://api.chucknorris.io/jokes/search?query=beard');
        $results = json_decode($this->curl->getBody(), true);
        $results = $results['result'];
        
        //For each result, check if it already exists in the database and, if not,
        // save it. Not going to update any existing rows as this will override
        // any changes submitted by admin.
        foreach($results as $result) {
            
            $collection = $this->apiCollection->create();
            $collection->addFieldToFilter('remote_id', $result->id);
            if($collection->count() === 0) {
                //If not in db, create and save record in db
                $apiRow = $this->apiFactory->create();
                $apiRow->setRemoteId($result->id)
                     ->setCreatedAt($result->created_at)
                     ->setUrl($result->url)
                     ->setValue($result->value)
                     ->save();
            }
        }
    }
}
