
    hash = window.location.hash.replace(/#/g, '');

    afterInput = function(url, todo, eventType){   //what to do after image is uploaded (depending on the hash in the url)


      if(typeof todo =='undefined'){var todo = false;}

      if(url == false){
          if(eventType=='done'){
            parent.mw.exec(hash, url, eventType);
          }
          parent.mw.tools.modal.remove('mw_rte_image');
          return false;
      }


      if(!todo){
          if(hash!==''){
            if(hash=='editimage'){
              parent.mw.image.currentResizing.attr("src", url);
              parent.mw.image.currentResizing.css('height', 'auto');
            }
            else if(hash=='set_bg_image'){
              parent.mw.wysiwyg.set_bg_image(url);

            }
            else{
              parent.mw.exec(hash, url, eventType);
            }
          }
          else{
            /*
              parent.mw.wysiwyg.restore_selection();
              parent.mw.wysiwyg.insert_image(url, true);

            */
          }
      }
      else{
        if(todo=='video'){
          parent.mw.wysiwyg.insert_html('<div class="element mw-embed-embed"><embed controller="true" wmode="transparent" windowlessVideo="true" loop="false" autoplay="false" width="560" height="315" src="'+url+'"></embed></div>');

        }
        else if(todo=='files'){

          var name = mw.tools.get_filename(url);
          var extension = url.split(".").pop();
          var html = "<a class='mw-uploaded-file mw-filetype-"+extension+"' href='" + url + "'><span></span>" + name + "." + extension + "</a>";
          parent.mw.wysiwyg.insert_html(html);
        }
      }
    }


    $(window).load(function(){
      $(mwd.body).removeClass('mw-external-loading');

    });










