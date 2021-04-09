<?php
namespace OmniPro\Prueba\Api\Data;

interface BlogInterface {

    /**
     * Return ID
     *
     * @return int
     */
    public function getId();

    /**
     * Set ID
     *
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * Return Title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set Title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title);

    /**
     * Set Email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email);

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set Content
     *
     * @param string $content
     * @return void
     */
    public function setContent($content);

    /**
     * Get Content
     *
     * @return string
     */
    public function getContent();

    /**
     * Set Img
     *
     * @param string $img
     * @return void
     */
    public function setImg($img);

    /**
     * get Img
     *
     * @return string
     */
    public function getImg();
}