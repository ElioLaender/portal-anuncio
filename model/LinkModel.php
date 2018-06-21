<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 10:54
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class LinkModel extends ConnectionFactory{

    private $link_id,
            $link_facebook,
            $link_anuncio_ref,
            $link_youtube,
            $link_linkedin,
            $link_twitter,
            $link_latter,
            $link_google_maps,
            $link_site;

    /**
     * @return mixed
     */
    public function getLinkSite()
    {
        return $this->link_site;
    }

    /**
     * @param mixed $link_site
     */
    public function setLinkSite($link_site)
    {
        $this->link_site = $link_site;
    }

    /**
     * @return mixed
     */
    public function getLinkId()
    {
        return $this->link_id;
    }

    /**
     * @param mixed $link_id
     */
    public function setLinkId($link_id)
    {
        $this->link_id = $link_id;
    }

    /**
     * @return mixed
     */
    public function getLinkFacebook()
    {
        return $this->link_facebook;
    }

    /**
     * @param mixed $link_facebook
     */
    public function setLinkFacebook($link_facebook)
    {
        $this->link_facebook = $link_facebook;
    }

    /**
     * @return mixed
     */
    public function getLinkAnuncioRef()
    {
        return $this->link_anuncio_ref;
    }

    /**
     * @param mixed $link_anuncio_ref
     */
    public function setLinkAnuncioRef($link_anuncio_ref)
    {
        $this->link_anuncio_ref = $link_anuncio_ref;
    }

    /**
     * @return mixed
     */
    public function getLinkYoutube()
    {
        return $this->link_youtube;
    }

    /**
     * @param mixed $link_youtube
     */
    public function setLinkYoutube($link_youtube)
    {
        $this->link_youtube = $link_youtube;
    }

    /**
     * @return mixed
     */
    public function getLinkLinkedin()
    {
        return $this->link_linkedin;
    }

    /**
     * @param mixed $link_linkedin
     */
    public function setLinkLinkedin($link_linkedin)
    {
        $this->link_linkedin = $link_linkedin;
    }

    /**
     * @return mixed
     */
    public function getLinkTwitter()
    {
        return $this->link_twitter;
    }

    /**
     * @param mixed $link_twitter
     */
    public function setLinkTwitter($link_twitter)
    {
        $this->link_twitter = $link_twitter;
    }

    /**
     * @return mixed
     */
    public function getLinkLatter()
    {
        return $this->link_latter;
    }

    /**
     * @param mixed $link_latter
     */
    public function setLinkLatter($link_latter)
    {
        $this->link_latter = $link_latter;
    }

    /**
     * @return mixed
     */
    public function getLinkGoogleMaps()
    {
        return $this->link_google_maps;
    }

    /**
     * @param mixed $link_google_maps
     */
    public function setLinkGoogleMaps($link_google_maps)
    {
        $this->link_google_maps = $link_google_maps;
    }


}