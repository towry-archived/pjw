<?php defined('PJ') or die();

class PJ_Asset
{
    /**
     * @var string
     */
    private $site;

    /**
     * @var string
     */
    private $folder;

    /**
     * Constructor
     */
    public function __construct( $folder, $site )
    {
        $this->folder = $folder;
        $this->site = $site;
    }

    /**
     * Set folder
     */
    public function setFolder( $folder )
    {
        $this->folder = $folder;
    }

    /**
     * Get folder
     */
    public function getFolder()
    {
        return $this->folder;
    }

    public function css( $css, $version = true )
    {
        if ($version) {
            $version = defined('DEBUG') && DEBUG ? false : true;
        }

        $file = $this->site . '/' . $this->folder . '/' . $css;
        if ($version) {
            $file .= '?v=' . date('Ymd', time());
        }
        
        $file = htmlspecialchars( $file );
        echo $file;
    }

    public function js( $js ) 
    {
        $file = $this->site . '/' . $this->folder . '/' . $js;
        echo $file;
    }
}

