<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HelloWorlds View
 */
class TaskManViewProjects extends JViewLegacy
{
        /**
         * HelloWorlds view display method
         * @return void
         */
        function display($tpl = null) 
        {
                // Get data from the model
                $state = $this->get('State');
                $items = $this->get('Items');
                $pagination = $this->get('Pagination');
 
                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Assign data to the view
                $this->state = $state;
                 $this->items = $items;
                $this->pagination = $pagination;
				$this->addToolBar();
				
				$this->setDocument();
                // Display the template
                parent::display($tpl);
        }
         protected function addToolBar() 
        {
          $input=JFactory::getApplication()->input;
          //$input->set('hidemainmenu',true);
        //  $isNew=($this->item->id=0);
          //JToolBarHelper::title($isNew ? JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLD_NEW')
           //                                  : JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLD_EDIT'));
               JToolBarHelper::title(JText::_('COM_TASKMAN_MANAGER_PROJECTS'));
                JToolBarHelper::addNew('project.add');
               JToolBarHelper::editList('project.edit');
                JToolBarHelper::deleteList('','projects.delete');
                 JToolBarHelper::publish('projects.publish', 'JTOOLBAR_PUBLISH', true);
                 JToolBarHelper::unpublish('projects.unpublish', 'JTOOLBAR_UNPUBLISH', true);
                 JToolBarHelper::trash('projects.trash', 'JTOOLBAR_TRASH', true);
            

                     
        }
        
        
        
            protected function setDocument() 
        {
                $document = JFactory::getDocument();
                $document->setTitle(JText::_('HELLOWORLD_MESSAGE'));
        }
               
                
               
        }
//}
