$(function(){
    new CategoryPage();
})

class CategoryPage {
    constructor () {
        this.init();
        this.sortEvent();
        this.filterEvents();
        this.removeFilterEvents();
    }

    init() {        
        var colorFilterInp = $('#filter-form-colors-inp');
        var sizesFilterInp = $('#filter-form-sizes-inp');
        var lengthsFilterInp = $('#filter-form-lengths-inp');
        var brandFilterInp = $('#filter-form-brands-inp');
        var colorFilter = this.getUrlParameter('prefC');
        var sizesFilter = this.getUrlParameter('prefS');
        var lengthsFilter = this.getUrlParameter('prefL');
        var brandsFilter = this.getUrlParameter('prefB');
        if(typeof brandsFilter == "undefined") {brandsFilter = brandFilterInp.val();}
        else{brandsFilter += ((brandFilterInp.attr('value').length>0 && brandFilterInp.val() != brandFilterInp.val())? "|"+brandFilterInp.val() : "");}
        
        if(typeof colorFilter != "undefined") {
            var colors = colorFilter.toString().split(/\|/);
            colors.forEach(function(el){
                el = el.replace('+', ' ');
                var filterOption = $('.colorFilter[value="'+el+'"]');
                filterOption.prop('checked', true);
            })
            colorFilterInp.val(colorFilter.toString().replace('+',' '));
        }
        if(typeof sizesFilter != "undefined") {
            var sizes = sizesFilter.toString().split(/\|/);
            sizes.forEach(function(el){
                el = el.replace('+', ' ');
                var filterOption = $('.sizesFilter[value="'+el+'"]');
                filterOption.prop('checked', true);
            })
            sizesFilterInp.val(sizesFilter.toString().replace('+',' '));
        }
        if(typeof lengthsFilter != "undefined") {
            var lengths = lengthsFilter.toString().split(/\|/);
            lengths.forEach(function(el){
                el = el.replace('+', ' ');
                var filterOption = $('.lengthsFilter[value="'+el+'"]');
                filterOption.prop('checked', true);
            })
            lengthsFilterInp.val(lengthsFilter.toString().replace('+',' '));
        }
        if(typeof brandsFilter != "undefined") {
            var brands = decodeURIComponent(brandsFilter.toString()).split(/\|/);
            brands = [...new Set(brands)];
            brands.filter((item,index) => brands.indexOf(item) === index);
            brands.reduce((unique, item) => unique.includes(item) ? unique : [...unique, item],[]);
            brands.forEach(function(el){
                el = el.replace('+', ' ');
                var filterOption = $('.brandFilter[value="'+decodeURIComponent(el)+'"]');
                filterOption.prop('checked', true);
            });
            brandFilterInp.val(brandsFilter.toString().replace('+',' '));
        }
    }

    sortEvent() {
        $('#sorting-select').change(function() {
            var selectedSorting = $(this). children("option:selected").val();
            $('#filter-form-sorting-inp').val(selectedSorting);
            $('#filter-category-form').submit();
        })
    }

    filterEvents() {
        $('.sizesFilter').change(function() {
            var el = $(this);
            var selected = el.is(':checked');
            var val = el.val();
            var filterInp = $('#filter-form-sizes-inp');
            var filterVal = filterInp.val().toString();
            var FilterValArray = [];
            FilterValArray = filterVal.split("|");
            var NewfilterVal = "";
            
            FilterValArray.forEach(function(item, index) 
            {   if(item != "")
                {   if(item == val)
                    { if(selected){NewfilterVal += ((NewfilterVal!="")? "|"+(item) : (item)); } }
                    else{NewfilterVal += ((NewfilterVal!="")? "|"+(item) : (item)); }
                }
            }); filterVal = NewfilterVal;            

            if(!selected) { filterInp.val(filterVal); }
            else { filterInp.val(((filterVal == '') ? '' : filterVal+'|') + ((selected) ? val.toString() : '')); }
            
            $('#filter-category-form').submit();
        })

        $('.lengthsFilter').change(function() {
            var el = $(this);
            var selected = el.is(':checked');
            var val = el.val();
            var filterInp = $('#filter-form-lengths-inp');
            var filterVal = filterInp.val().toString();
            var FilterValArray = [];
            FilterValArray = filterVal.split("|");
            var NewfilterVal = "";
            
            FilterValArray.forEach(function(item, index) 
            {   if(item != "")
                {   if(item == val)
                    { if(selected){NewfilterVal += ((NewfilterVal!="")? "|"+(item) : (item)); } }
                    else{NewfilterVal += ((NewfilterVal!="")? "|"+(item) : (item)); }
                }
            }); filterVal = NewfilterVal;            

            if(!selected) { filterInp.val(filterVal); }
            else { filterInp.val(((filterVal == '') ? '' : filterVal+'|') + ((selected) ? val.toString() : '')); }
            
            $('#filter-category-form').submit();
        })

        $('.colorFilter').change(function() {
            var el = $(this);
            var selected = el.is(':checked');
            var val = el.val();
            var filterInp = $('#filter-form-colors-inp');
            var filterVal = filterInp.val().toString();

            var FilterValArray = [];
            FilterValArray = filterVal.split("|");
            var NewfilterVal = "";
            FilterValArray.forEach(function(item, index) 
            {   if(item != "" && item != val)
                {  NewfilterVal += ((NewfilterVal!="")? "|"+(item) : (item));  }
            }); filterVal = NewfilterVal;

            if(!selected) { filterInp.val(filterVal); }
            else { filterInp.val(((filterVal == '') ? '' : filterVal+'|') + ((selected) ? val.toString() : '')); }
            
            $('#filter-category-form').submit();
        })

        $('.brandFilter').change(function() {
            var el = $(this);
            var selected = el.is(':checked');
            var val = el.val();
            var filterInp = $('#filter-form-brands-inp');
            var filterVal = filterInp.val().toString();
            var FilterValArray = [];
            FilterValArray = filterVal.split("|");
            var NewfilterVal = "";
            
            FilterValArray.forEach(function(item, index) 
            { if(item != "" && item != val)
                {  NewfilterVal += ((NewfilterVal!="")? "|"+(item) : (item));  }
            }); filterVal = NewfilterVal;

            if(!selected) { filterInp.val(filterVal); }
            else { filterInp.val(((filterVal == '') ? '' : filterVal+'|') + ((selected) ? val.toString() : '')); }
            
            $('#filter-category-form').submit();
        })
    }

    removeFilterEvents() {
        $('.activeFilter').click(function(){
            var filterType = $(this).attr('data-ovfilter-type');
            var filterVal = $(this).attr('data-ovfilter-value');
            var filters = {
                'color' : 'colorFilter',
                'size' : 'sizesFilter',
                'length' : 'lengthsFilter',
                'brand' : 'brandFilter'
            };
            $('.'+filters[filterType]+'[value="'+(filterVal)+'"]').prop('checked', false).triggerHandler('change');


                switch(filterType)
                {
                    case 'brand' : 
                        var filterInp = $('#filter-form-brands-inp');
                    break;
                    case 'color' : 
                        var filterInp = $('#filter-form-colors-inp');
                    break;
                    case 'size' : 
                        var filterInp = $('#filter-form-sizes-inp');
                    break;
                    case 'length' : 
                        var filterInp = $('#filter-form-lengths-inp');
                    break;
                }
                var FilterValArray = [];
                FilterValArray = filterInp.val().split("|");
                var NewfilterVal = "";
                FilterValArray.forEach(function(item, index) 
                {   if(item != "" && item != filterVal)
                    {  NewfilterVal += ((NewfilterVal!="")? "|"+(item) : (item));  }
                });
                filterVal = NewfilterVal;
                filterInp.val(filterVal);


            $(this).parent().remove();
            $('#filter-category-form').submit();
        });
    }

    getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
    
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
    
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };
}