<?php

class block_zendesk extends block_base {
    
    public function init() {
        $this->blockname = get_class($this);
        $this->title = get_string('pluginname', $this->blockname);
    }
    
    public function has_config() {
        return true;
    }
    
    public function applicable_formats() {
      return array('site' => true);
    }
    
    public function instance_allow_multiple() {
      return false;
    }
    
    public function instance_can_be_hidden() {
        return false;
    }
    
    public function hide_header() {
      return false;
    }
    
    public function html_attributes() {
        $attributes = parent::html_attributes(); // Get default values
        
        // If we are in editing mode hide the block because there is no content
        // The block is only used to include the JS and CSS from Zendesk.
        if ($this->page->user_is_editing()) {
                    $attributes['class'] .= ' zd_hidden'; 
        }
        
        return $attributes;
    }
    
    public function get_content() {
        
        if (!isloggedin()) {
            $this->content = NULL;
            return $this->content;
        }
        
        if ($this->content !== null) {
          return $this->content;
        }
        $this->get_config();
        
        $this->content         =  new stdClass;
        $this->content->text   = '';
        $this->content->footer = '';
        
        // check the permissions and only require JS if we have the capability and 
        // if user is not a siteadmin only require if we have allow_teacher_role 
        // config (set in block config)
        $allowteacher  = get_config('zendesk', 'allow_teacher_role');
        $hascapability = has_capability('block/zendesk:viewtab', $this->page->context);
        
        if ($allowteacher && $hascapability) {
            $this->page->requires->yui_module('moodle-block_zendesk-zendesk', 'M.block_zendesk.zendesk.init', array($this->config));
        
        } else if (is_siteadmin($this->config->user->id) && $hascapability) {
            $this->page->requires->yui_module('moodle-block_zendesk-zendesk', 'M.block_zendesk.zendesk.init', array($this->config));
        }
        
        // If we are in editing mode and the user is a siteadmin show the config (can view in the source)
        if ($this->page->user_is_editing() && is_siteadmin($this->config->user->id)) {

            $this->content->text = html_writer::start_tag('dl');
            foreach ($this->config as $key => $value) {
            
                if (is_string($value)) {
                    $this->content->text .= html_writer::tag('dt' , get_string('tab_'.$key, get_class($this)) . ': ');
                    $this->content->text .= html_writer::tag('dd', $value );
                }
            }
            $this->content->text .= html_writer::end_tag('dl');
            
            // $this->content->text = $output;
        }
        
        return $this->content;
    }
    
    // Setup the configuration to pass to the YUI module
    private function get_config($print = false) {
        
        global $USER;
        
        $config = new stdClass;
        $config->id         = get_config('zendesk', 'tab_id');
        $config->label      = get_config('zendesk', 'tab_label');
        $config->colour     = get_config('zendesk', 'tab_colour');
        $config->h_position = get_config('zendesk', 'tab_h_position');
        $config->v_position = get_config('zendesk', 'tab_v_position');
        
        $zendesk_url = 'https://' . get_config('zendesk', 'tab_domain') . '.zendesk.com';
        
        $config->domain  = $zendesk_url;
        $config->user = new stdClass;
        
        $config->user->id        = $USER->id;
        $config->user->email     = $USER->email;
        $config->user->firstname = $USER->firstname;
        $config->user->lastname  = $USER->lastname;
        
        return $this->config = $config;
    }
}
