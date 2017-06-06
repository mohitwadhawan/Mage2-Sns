<?php

namespace Sns\Affiliate\Controller\Adminhtml\Items;

class Save extends \Sns\Affiliate\Controller\Adminhtml\Items
{

    public function execute()
    {
        if ($this->getRequest()->getPostValue()) {
            try {
                $model = $this->_objectManager->create('Sns\Affiliate\Model\Items');
                $data = $this->getRequest()->getPostValue();
                $inputFilter = new \Zend_Filter_Input(
                    [],
                    [],
                    $data
                );
                $data = $inputFilter->getUnescaped();
                $id = $this->getRequest()->getParam('id');
                if ($id) {
                    $model->load($id);
                    if ($id != $model->getId()) {
                        throw new \Magento\Framework\Exception\LocalizedException(__('The wrong item is specified.'));
                    }
                }
                $model->setData($data);

                //Image Save
                /*try {
                    $input="preview_image";
                    if (isset($data[$input])) {
                        $fileUploaderFactory=\Magento\MediaStorage\Model\File\UploaderFactory::getInstance();
                        $uploader = $fileUploaderFactory->create(['fileId' => $input]);
                        $uploader->setAllowRenameFiles(true);
                        $uploader->setFilesDispersion(true);
                        $uploader->setAllowCreateFolders(true);
                        //$path = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath('images/');
                        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

                        $fileSystem = $objectManager->create('\Magento\Framework\Filesystem');
                        $mediaPath  =   $fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath();
                        $media  =  $mediaPath;

                        $result = $uploader->save($media);
                    }
                } catch (\Exception $e) {
                    if ($e->getCode() != \Magento\Framework\File\Uploader::TMP_NAME_EMPTY) {
                        throw new FrameworkException($e->getMessage());
                    }
                } */
                //Image Save

                $session = $this->_objectManager->get('Magento\Backend\Model\Session');
                $session->setPageData($model->getData());
                $model->save();
                $this->messageManager->addSuccess(__('You saved the item.'));
                $session->setPageData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('sns_affiliate/*/edit', ['id' => $model->getId()]);
                    return;
                }
                $this->_redirect('sns_affiliate/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
                $id = (int)$this->getRequest()->getParam('id');
                if (!empty($id)) {
                    $this->_redirect('sns_affiliate/*/edit', ['id' => $id]);
                } else {
                    $this->_redirect('sns_affiliate/*/new');
                }
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('Something went wrong while saving the item data. Please review the error log.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($data);
                $this->_redirect('sns_affiliate/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->_redirect('sns_affiliate/*/');
    }
}
