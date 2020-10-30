<?php
namespace Learning\Magestore\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_pageFactory;
    protected $_customerFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        \Learning\Magestore\Model\CustomerFactory $customerFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_customerFactory = $customerFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->_customerFactory->create();
        $collection = $post->getCollection();
//        var_dump($collection);
        echo 1;
        foreach ($collection as $item) {
            echo '<pre>';
            print_r($item->getData());
            echo'</pre>';
        }
        exit();
        return $this->_pageFactory->create();
    }
}
