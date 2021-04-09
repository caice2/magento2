<?php

namespace OmniPro\Prueba\Block;


class Index extends \Magento\Framework\View\Element\Template
{

   
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }  
    public function getBlogs(){
      
            $html = '<div class="post">                   
            <div class="new_post">
                <p>New blog post</p>
                <input type="text" name="title_post" id="title_post" placeholder="My post title">
            </div>            
            <div class="contents_post">
            <textarea name="text_post" id="text_post" cols="30" rows="10" placeholder="Here all my important post text!"></textarea>
            </div>            
            <div class="information">
            <input type="email" name="email_post" id="email_post" placeholder="Email Address">
            <input type="button" value="Upload image">
            </div>
            <div class="button">
            <input type="button" value="Save post">
            </div>
            </div>';        
        return $html;
        }
        public function titleBlog(){
            $title = '<div class="title">
            <center>
                <h1>My spectaluar blog</h1>
                <p>A totally false statement</p>    
            </center>    
        </div>';
    
        return $title;
        }
}