/**
 * @Author: Alex Dong
 * @Date:   2020-04-15 18:40:02
 * @Last Modified by:   Alex Dong
 * @Last Modified time: 2020-07-25 17:14:24
 */

(function ($) {
    $.fn.instagram = function (options) {
        var defaults = {
            username: 'aloteams',
            limit: 6,
            lazy: true,
            srcSize: 320,
            srcMedia: 'media_url',
            overlay: true,
            apikey: false,
            accessToken: '',
            picasaAlbumId: '',
            tags: '',
            afterload: function() {},
            callback: function() {}
        };
        var options = $.extend(defaults, options);
        return this.each(function () {
            var object = $(this);
            object.append("<ul class=\"instagram-list social-list\"></ul>");
            var imagesize = [150, 240, 320, 480, 640];
            var size      = parseInt(options.srcSize);
            var imgsize   = (imagesize.indexOf(size) != -1) ? imagesize.indexOf(size) : 1 ;

            // check if access token is set
            if ((typeof (options.accessToken) != "undefined") && options.accessToken != "") {
                var url          = "https://graph.instagram.com/me/media";
                var access_token = options.accessToken;
                var limit        = options.limit;
                $.getJSON( url, {'access_token': access_token, 'limit': limit, 'fields': 'id, caption, comments_count, like_count, media_type, media_url, thumbnail_url, permalink' }, function (data) {
                    $.each(data.data, function (i, shot) {
                       if (shot.media_type !== 'IMAGE') return;
                        var photo_src = shot.media_url;
                        var photo_url = shot.permalink;
                        var photo_title = "";
                        if (shot.caption != null) {
                            photo_title = shot.caption;
                        }
                        if(options.lazy){
                            var photo_container = $('<img/>').attr({
                                'data-src'  : photo_src,
                                src         : 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==',
                                class       : 'lazyload',
                                alt         : photo_title,
                                width       : imagesize[imgsize],
                                height      : imagesize[imgsize]
                            });
                        }else {
                            var photo_container = $('<img/>').attr({
                                src: photo_src,
                                alt: photo_title
                            });
                        }
                        var url_container = $('<a/>').attr({
                            href: photo_url,
                            target: '_blank',
                            title: photo_title
                        });

                        var tmp = $(url_container).append(photo_container);
                        if (options.overlay) {
                            var overlay_div = $('<div/>').addClass('img-overlay');
                            $(url_container).append(overlay_div);
                        }
                        var li = $('<li/>').append(tmp);
                        var sub =  (shot.like_count !=  undefined )     ? '<span class="likes">' + shot.like_count + '</span>' : '';
                        sub     += (shot.comments_count != undefined)   ? '<span class="comments">' + shot.comments_count + '</span>' : '';
                        if(sub) li.append('<span class="sub">' + sub + '</span>');
                        $("ul", object).append(li);

                    });

                }).done(function() {
                    if(options.lazy) object.trigger('contentUpdated');
                    options.afterload.call(object);  
                }).fail(function() {
                    console.warn( "Request Instagram Access Failed: ");
                });                            
            } else {
                console.warn("Instagram Access Token is not set. Please enter it in plugin init call.");
            }

            options.callback.call(this);
        });
    };
})(jQuery);
