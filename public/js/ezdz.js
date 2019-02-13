 /* ----------------------------------------------------------------------------
 // Ezdz [izy-dizy]
 // v0.6.1 - released 2017-12-30 21:01
 // Licensed under the MIT license.
 // https://github.com/jaysalvat/ezdz
 // ----------------------------------------------------------------------------
 // Copyright (C) 2017 Jay Salvat
 // http://jaysalvat.com/
 // ---------------------------------------------------------------------------*/

 !function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){"use strict";var b={className:"",text:"Drop a file",previewImage:!0,value:null,classes:{main:"ezdz-dropzone",enter:"ezdz-enter",reject:"ezdz-reject",accept:"ezdz-accept",focus:"ezdz-focus"},validators:{maxSize:null,width:null,maxWidth:null,minWidth:null,height:null,maxHeight:null,minHeight:null},init:function(){},enter:function(){},leave:function(){},reject:function(){},accept:function(){},format:function(a){return a}};a.ezdz=function(c,d){this.settings=a.extend(!0,{},b,a.ezdz.defaults,d),this.$input=a(c);var e=this,f=e.settings,g=e.$input;if(g.is('input[type="file"]')&&a.ezdz.isBrowserCompatible()){var h=function(){var b,c,d;c=a('<div class="'+f.classes.main+'" />').on("dragover.ezdz",function(b){var c=b.originalEvent.dataTransfer;c.types&&(c.types.indexOf?c.types.indexOf("Files")!=-1:c.types.contains("Files"))&&(a(this).addClass(f.classes.enter),a.isFunction(f.enter)&&f.enter.apply(this))}).on("dragleave.ezdz",function(){a(this).removeClass(f.classes.enter),a.isFunction(f.leaved)&&f.leaved.apply(this)}).addClass(f.className),g.wrap(c).before("<div>"+f.text+"</div>"),b=g.parent("."+f.classes.main),d=f.value||g.data("value"),d&&e.preview(d),a.isFunction(f.init)&&f.init.apply(g,[d]),g.on("focus.ezdz",function(){b.addClass(f.classes.focus)}).on("blur.ezdz",function(){b.removeClass(f.classes.focus)}).on("change.ezdz",function(){var c=this.files[0];if(c){var d=c.name.replace(/\\/g,"/").replace(/.*\//,""),h=c.name.split(".").pop(),i=f.format(d);c.extension=h;var j=g.attr("accept"),k=!1,l=!0,m={mimeType:!1,maxSize:!1,width:!1,minWidth:!1,maxWidth:!1,height:!1,minHeight:!1,maxHeight:!1};if(j){var n=j.split(/[,|]/);a.each(n,function(b,d){if(d=a.trim(d),"."+h===d)return k=!0,!1;if(c.type===d)return k=!0,!1;if(d.indexOf("/*")!==!1){var e=d.replace("/*",""),f=c.type.replace(/(\/.*)$/g,"");if(e===f)return k=!0,!1}}),k===!1&&(m.mimeType=!0)}else k=!0;if(b.removeClass(f.classes.reject+" "+f.classes.accept),k!==!0)return g.val(""),b.addClass(f.classes.reject),e.preview(null),a.isFunction(f.reject)&&f.reject.apply(g,[c,m]),!1;var o=new FileReader(c);o.readAsDataURL(c),o.onload=function(d){var h,j=new Image;c.data=d.target.result,j.src=c.data,setTimeout(function(){h=j.width&&j.height,f.validators.maxSize&&c.size>f.validators.maxSize&&(l=!1,m.maxSize=!0),h&&(c.width=j.width,c.height=j.height,f.validators.width&&j.width!==f.validators.width&&(l=!1,m.width=!0),f.validators.maxWidth&&j.width>f.validators.maxWidth&&(l=!1,m.maxWidth=!0),f.validators.minWidth&&j.width<f.validators.minWidth&&(l=!1,m.minWidth=!0),f.validators.height&&j.height!==f.validators.height&&(l=!1,m.height=!0),f.validators.maxHeight&&j.height>f.validators.maxHeight&&(l=!1,m.maxHeight=!0),f.validators.minHeight&&j.height<f.validators.minHeight&&(l=!1,m.minHeight=!0)),l===!0?(b.find("img").remove(),h&&f.previewImage===!0?b.find("div").html(a(j).fadeIn()):b.find("div").html("<span>"+i+"</span>"),b.addClass(f.classes.accept),a.isFunction(f.accept)&&f.accept.apply(g,[c])):(g.val(""),b.addClass(f.classes.reject),e.preview(null),a.isFunction(f.reject)&&f.reject.apply(g,[c,m]))},250)}}})};h()}},a.ezdz.prototype.preview=function(b,c){var d=this.settings,e=this.$input,f=e.parent("."+d.classes.main),g=(b||"").replace(/\\/g,"/").replace(/.*\//,""),h=d.format(g);if(!b)return f.removeClass([d.classes.enter,d.classes.reject,d.classes.accept].join(" ")).find("div").html(d.text),void e.val("");var i=new Image;i.src=b,i.onload=function(){f.find("div").html(a(i).fadeIn()),a.isFunction(c)&&c.apply(this)},i.onerror=function(){f.find("div").html("<span>"+h+"</span>"),a.isFunction(c)&&c.apply(this)},f.addClass(d.classes.accept)},a.ezdz.prototype.destroy=function(){var a=this.settings,b=this.$input;b.parent("."+a.classes.main).replaceWith(b),b.off("*.ezdz"),b.removeData("ezdz")},a.ezdz.prototype.options=function(b){var c=this.settings;return b?void a.extend(!0,this.settings,b):c},a.ezdz.prototype.container=function(){var a=this.settings,b=this.$input;return b.parent("."+a.classes.main)},a.ezdz.isBrowserCompatible=function(){return!!(window.File&&window.FileList&&window.FileReader)},a.ezdz.defaults=b,a.fn.ezdz=function(b){var c,d=arguments;return this.each(function(){return(c=a(this).data("ezdz"))?c[b]?c[b].apply(c,Array.prototype.slice.call(d,1)):void a.error("Ezdz error - Method "+b+" does not exist."):a(this).data("ezdz",new a.ezdz(this,b))})}});