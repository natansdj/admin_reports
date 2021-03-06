<?php
class Voga_AdminReports_Block_Adminhtml_Base_Report extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected $_controller = '';
    protected $_reportHeaderText = '';

    public function __construct()
    {
        $helper = Mage::helper('voga_adminreports');
        $this->_blockGroup = 'voga_adminreports';
        $this->_headerText = $helper->__($this->_reportHeaderText);
        parent::__construct();
        $this->setTemplate('report/grid/container.phtml');
        $this->_removeButton('add');
        $this->addButton('filter_form_submit', array(
            'label' => $helper->__('Show Report'),
            'onclick' => 'filterFormSubmit()'
        ));
    }

    public function getFilterUrl()
    {
        $this->getRequest()->setParam('filter', null);
        return $this->getUrl('*/*/report', array('_current' => true));
    }
}
