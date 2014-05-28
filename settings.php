<?php
defined('MOODLE_INTERNAL') || die;


$settings->add(new admin_setting_heading(
        'zendesk/headerconfig',
        get_string('config', 'block_zendesk'),
        get_string('config_desc', 'block_zendesk')
));

$settings->add(new admin_setting_configtext(
        'zendesk/tab_domain',
        get_string('tab_domain', 'block_zendesk'), 
        get_string('tab_domain_desc', 'block_zendesk'),
        null,
        '/^[a-zA-Z0-9]+$/'
));

$settings->add(new admin_setting_configtext(
        'zendesk/tab_label',
        get_string('tab_label', 'block_zendesk'), 
        get_string('tab_label_desc', 'block_zendesk'),
        'Help Me'
));

$settings->add(new admin_setting_configtext(
        'zendesk/tab_id',
        get_string('tab_id', 'block_zendesk'), 
        get_string('tab_id_desc', 'block_zendesk'),
        null,
        PARAM_INT
));

$settings->add(new admin_setting_configcolourpicker(
        'zendesk/tab_colour',
        get_string('tab_colour', 'block_zendesk'), 
        get_string('tab_colour_desc', 'block_zendesk'),
        'black'
));

$settings->add(new admin_setting_configselect(
        'zendesk/tab_h_position',
        get_string('tab_h_position', 'block_zendesk'), 
        get_string('tab_h_position_desc', 'block_zendesk'),
        'left',
        array(
            'Left' => 'left', 
            'Right' => 'right')
));

$settings->add(new admin_setting_configtext(
        'zendesk/tab_v_position',
        get_string('tab_v_position', 'block_zendesk'), 
        get_string('tab_v_position_desc', 'block_zendesk'),
        30,
        PARAM_INT
));

$settings->add(new admin_setting_configcheckbox(
        'zendesk/allow_teacher_role',
        get_string('teacherrole', 'block_zendesk'), 
        get_string('teacherrole_desc', 'block_zendesk'),
        '0'
));
