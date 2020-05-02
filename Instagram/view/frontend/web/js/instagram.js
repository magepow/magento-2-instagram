/**
 * @Author: Alex Dong
 * @Date:   2020-04-15 18:40:02
 * @Last Modified by:   nguyen
 * @Last Modified time: 2020-05-02 11:53:13
 */

(function ($) {
    $.fn.instagram = function (options) {
        var defaults = {
            username: 'aloteams',
            limit: 6,
            lazy: true,
            srcSize: 320,
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
                var access_token = options.accessToken;

                // var url = "https://api.instagram.com/v1/users/self/?access_token=" + access_token ;
                // // var url = "https://www.instagram.com/" + instagram_username + "/?__a=1";
                // $.getJSON(url, function (data) {
                //         var shot = data.data;
                //         var instagram_username = shot.username;
                //         if (instagram_username == options.username) {
                //             var user_id = shot.id;

                //             if (user_id != "") {
                                var tags = '';
                                if(options.tags) tags = '&tags=' + options.tags;
                                var while_loop = true;
                                var $item = 0;
                                var url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=" + access_token + "&count=" + options.limit + tags + "&callback=?";
                                getImage();                             
                //             }
                //         }
                // });

                function getImage(){
                    $.getJSON(url, {}, function (data) {
                        if(!jQuery.isEmptyObject( data.pagination )){
                            url = data.pagination.next_url;
                        } else {
                            while_loop = false;
                        }
                        if($item >= options.limit){
                            while_loop = false;
                        }
                        $.each(data.data, function (i, shot) {
                            // if(shot.tags.indexOf( options.tags )) return;
                            if( $item >= options.limit){
                                return false;
                                while_loop = false;
                            }
                            $item++;
                            //var photo_src = shot.images.thumbnail.url;
                            var photo_src = shot.images.low_resolution.url;
                            //var photo_src = shot.images.standard_resolution.url;
                            var photo_url = shot.link;

                            var photo_title = "";
                            if (shot.caption != null) {
                                photo_title = shot.caption.text;
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
                            var likes = '<span class="likes">' + shot.likes.count + '</span>';
                            var comments = '<span class="comments">' + shot.comments.count + '</span>';

                            var tmp = $(url_container).append(photo_container);
                            if (options.overlay) {
                                var overlay_div = $('<div/>').addClass('img-overlay');
                                $(url_container).append(overlay_div);
                            }
                            var li = $('<li/>').append(tmp);
                            li.append('<span class="sub">' + likes + comments + '</span>');
                            $("ul", object).append(li);

                        });

                    }).done(function() {
                        if(while_loop) getImage;
                        else {
                            if(options.lazy) object.trigger('contentUpdated');
                            options.afterload.call(object);    
                        }
                    }).fail(function() {
                        console.log( "Request Failed: ");
                    });                            
                }
            } else {
                console.warn("Instagram Access Token is not set. Please enter it in plugin init call.");
                if ((typeof (options.username) == "undefined")){
                    console.warn("Instagram User is not set. Please enter it in plugin init call.");
                    var instagram_username = 'aloteams';

                } else {
                    var instagram_username = options.username;
                }

                var url_original = "https://www.instagram.com/";
                var url = url_original + instagram_username + "/?__a=1";
                var $item = 0;
                $.getJSON(url, function (data) {
                    var media = data.graphql.user.edge_owner_to_timeline_media;
                    var edges = media.edges
                    // console.log(edges);
                    $.each(edges, function (i, shot) {
                        if( $item >= options.limit) return false;
                        $item++;
                        shot = shot.node;
                        // var photo_src = shot.display_url;
                        // var photo_src = shot.thumbnail_src;
                        var images = shot.thumbnail_resources;
                        var photo_src = images[imgsize].src;
                        var photo_url = url_original + 'p/' + shot.shortcode;
                        var photo_title = "";
                        if (shot.edge_media_to_caption != null) {
                            if(shot.edge_media_to_caption.edges.length){
                                photo_title = shot.edge_media_to_caption.edges[0].node.text;
                            }
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
                        var likes = '<span class="likes">' + shot.edge_liked_by.count + '</span>';
                        var comments = '<span class="comments">' + shot.edge_media_to_comment.count + '</span>';

                        var tmp = $(url_container).append(photo_container);
                        if (options.overlay) {
                            var overlay_div = $('<div/>').addClass('img-overlay');
                            $(url_container).append(overlay_div);
                        }
                        var li = $('<li/>').append(tmp);
                        li.append('<span class="sub">' + likes + comments + '</span>');
                        $("ul", object).append(li);

                    });

                    if(options.lazy) object.trigger('contentUpdated');

                    options.afterload.call(object);
                });
            }

            options.callback.call(this);
        });
    };
})(jQuery);
