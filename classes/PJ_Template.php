<?php
/**
 * PJ_Template
 * @since 1.0
 */

class PJ_Template
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var array
     */
    private $context;

    /**
     * Constructor
     */
    public function __construct( $path = null )
    {
        $this->path = $path;
        $this->context = array();
    }

    /**
     * Render a partial template
     */
    public function partial( $part )
    {
        extract( $this->context );
        $file = $this->path . DIRECTORY_SEPARATOR . $part;
        if ( file_exists( $file ) ) {
            include( $file );
        } else {
            throw new RuntimeException("The template: {{$file}} can't be found.", 1);
        }
    }

    /**
     * Push to context
     */
    public function set( $key, $value )
    {
        $this->context[$key] = $value;
        return $this;
    }

    /**
     * Get from context
     */
    public function get( $key )
    {
        return isset( $this->context[$key] ) ? $this->context[$key] : null;
    }

    /**
     * Render a template
     */
    public function render( $tpl, $context = array())
    {
        $context = array_merge($this->context, $context);

        ob_start();
        ob_implicit_flush();
        extract( $context );

        $file = $this->path . DIRECTORY_SEPARATOR . $tpl;

        if ( file_exists($file) ) {
            include( $file );
        } else {
            throw new RuntimeException("The template: {{$file}} can't be found.", 1);
        }

        $contents = ob_get_clean();
        return $contents;
    }

    public function display( $tpl, $context = array() )
    {
        $content = $this->render( $tpl, $context );

        echo $content;
    }

    /**
     * Set path
     */
    public function setPath( $path )
    {
        $this->path = $path;
    }

    /**
     * Get path
     */
    public function getPath()
    {
        return $this->path;
    }
}
