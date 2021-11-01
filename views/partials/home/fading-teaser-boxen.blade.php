<!-- PRICING -->
<section class="{{ $sectionCss ?? '' }} text-center" id="pricing">
<style>

/* Hover box ------------------------------------------------------------------------- */
.hover_box{text-align:center;line-height:0}
.hover_box a{display:block;line-height:0}
.hover_box .hover_box_wrapper{display:inline-block;position:relative;overflow:hidden;line-height:0;max-width:100%}
.hover_box .hover_box_wrapper img{display:block}
.hover_box .hover_box_wrapper .visible_photo{opacity:1;filter:alpha(opacity=100)}
.hover_box .hover_box_wrapper .hidden_photo{position:absolute;left:50%;top:50%;opacity:0;filter:alpha(opacity=0);-ms-transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}
.hover_box:hover .hover_box_wrapper .visible_photo,.hover_box.hover .hover_box_wrapper .visible_photo{opacity:0;filter:alpha(opacity=0)}
.hover_box:hover .hover_box_wrapper .hidden_photo,.hover_box.hover .hover_box_wrapper .hidden_photo{opacity:1;filter:alpha(opacity=100)}

.hover_box .hover_box_wrapper .visible_photo,.hover_box .hover_box_wrapper .hidden_photo{-webkit-transition:all .4s ease-in-out;-moz-transition:all .4s ease-in-out;-o-transition:all .4s ease-in-out;transition:all .4s ease-in-out}
/* Images ---------------------------------------------------------------------------- */
img.scale-with-grid,#Content img{min-width:100%;max-width:100%;height:auto}


.one-third.mcb-wrap {
    width: 33.333%;
}
.clearfix {
    zoom: 1;
}
.mcb-wrap {
    float: left;
    position: relative;
    z-index: 1;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
@media only screen and (max-width: 767px)
{
  .mcb-wrap, .mcb-column {
      margin: 0;
      width: 100%!important;
      clear: both;
  }
}
</style>
  <div class="container d-inline-block mx-auto">
  
        @foreach ($options as $option)
        <div class="pb-8 px-md-1  wrap mcb-wrap one-third  valign-top clearfix" style="">
      <div class="mcb-wrap-inner">
        <div class="column mcb-column one column_hover_box ">
          <div class="hover_box">
            <div class="hover_box_wrapper">
              <img class="visible_photo scale-with-grid" src="{{ $option['img_front'] }}" alt="{{ $option['title'] }}">
              <img class="hidden_photo scale-with-grid" src="{{ $option['img_back'] }}" alt="{{ $option['title'] }}">
            </div>
          </div>
          </div>
      </div>          
      </div>
        @endforeach
      
  </div>
</section>