<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    
    'block/zendesk:addinstance' => array(
        
        'riskbitmask' => RISK_SPAM | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_BLOCK,
        
        'clonepermissionsfrom' => 'moodle/site:manageblocks'
    ),
 
    'block/zendesk:viewtab' => array(
        
        'captype' => 'read',
        'contextlevel' => CONTEXT_BLOCK,
        
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
        )
    )
);
