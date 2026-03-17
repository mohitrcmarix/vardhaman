<?php

add_action('after_setup_theme', 'initialize_kirki_settings', 20);

function initialize_kirki_settings()
{
    if (! class_exists('Kirki')) {
        return;
    }

    // Add your Kirki panels and sections here

    new \Kirki\Panel(
        'curamedix_panel',
        [
            'priority'    => 10,
            'title'       => esc_html__('CuraMedix Panel', 'curamedix'),
            'description' => esc_html__('CuraMedix theme customization panel', 'curamedix'),
        ]
    );
    new \Kirki\Section(
        'curamedix_header',
        [
            'title'       => esc_html__('Header section', 'curamedix'),
            'description' => esc_html__('You can customize theme header here.', 'curamedix'),
            'panel'       => 'curamedix_panel',
            'priority'    => 160,
        ]
    );


    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'curamedix_button_switch',
            'label'       => esc_html__('Show Button', 'curamedix'),
            'description' => esc_html__('Show/Hide right side button', 'curamedix'),
            'section'     => 'curamedix_header',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__('Show', 'curamedix'),
                'off' => esc_html__('Hide', 'curamedix'),
            ],
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'curamedix_button_text',
            'label'    => esc_html__('Button text', 'curamedix'),
            'section'  => 'curamedix_header',
            'default'  => esc_html__('CONTACT NOW', 'curamedix'),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\URL(
        [
            'settings' => 'curamedix_button_url',
            'label'    => esc_html__('Button URL', 'curamedix'),
            'section'  => 'curamedix_header',
            'priority' => 10,
        ]
    );
}
