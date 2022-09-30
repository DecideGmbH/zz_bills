$(document).ready(function() {
    $('#newBill').each(function() {
        
        var $form = $(this);
        var removeChild = function(e) {
            e.preventDefault();
            var $childPart = $(this).closest('.child-container-inner');
            $childPart.remove();
            return false;
        };
        var addChild = function() {
            var nextIndex = $form.find('.childs-container').data('index-next');
            if(nextIndex == undefined) {
                nextIndex = 0;
            }
            $form.find('.childs-container').data('index-next', nextIndex + 1);
            var sparepartsHtml = $('.child-container').html();
            // console.log('sparepartsHtml', sparepartsHtml);
            sparepartsHtml = sparepartsHtml.replace(/INDEX/g, nextIndex);
            // console.log('sparepartsHtml', sparepartsHtml);
            $('.childs-container').append(sparepartsHtml);
            var $sparepart = $('.childs-container').find('#child-' + nextIndex);
            // console.log('sparepart', $sparepart);
            // console.log('model.btn', $sparepart.find('.btn-add-new-spareparts'));
            $sparepart.find('.btn-remove-child').click(removeChild);
            // $.validate({
                // lang: language
                // ,language: $.formUtils.LANG[language]
                // , form: '.form'
            // });
            return false;
        };

        $form.find('.btn-remove-child').click(removeChild);
        $form.find('.btn-add-new-child').click(addChild);
    });
});