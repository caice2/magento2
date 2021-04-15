define([
    'ko',
    'jquery',
    'uiComponent',
    'mage/storage',
    'mage/url',
    'mage/validation'
], function(ko, $, Component, storage, url) {
    url.setBaseUrl(window.BASE_URL);
    return Component.extend({
        defaults: {
            titulo: '',
            contenido: '',
            email: '',
            image: '',
            imageBase64: '',
            blogs: [],
            blogsUrl: 'rest/V1/blogs?searchCriteria',
            blogPostUrl: 'rest/V1/blogs'
        },
        initialize: function() {
            this._super();
            this.getBlogs();
            this.titulo.subscribe(function(value) {
                console.log(value)
            });
            return this;
        },
        initObservable: function() {
            this._super()
                .observe([
                    'titulo',
                    'contenido',
                    'email',
                    'image',
                    'image64'
                ])
                .observe({
                    blogs: []
                });

            return this;
        },
        isFormValid: function(form) {
            return $(form).validation() && $(form).validation('isValid')
        },
        changeImage: function(data,event){
            var image = event.target.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = $.proxy(function(e){
                this.imageBase64(reader.result);
            }, this);
        },
        sendBlog: function(form) {
            if (!this.isFormValid(form)){
                return;
        }
            var blog = {
                'blog': {
                    "title": this.titulo(),
                    "email": this.email(),
                    "content": this.contenido(),
                    "img": this.image()
                }
            };
            storage.post(this.blogPostUrl, JSON.stringify(blog))
            .then($.proxy(function() {
                this.getBlogs();
            }, this));
        },
        getBlogs: function() {
            storage.get(this.blogsUrl)
            .then($.proxy(function(data) {
                this.blogs(data.items);
            },this));
        }
    });
});