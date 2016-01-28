var TechTest = TechTest || {};

TechTest.init = function() {
    
    // hide submit button - we'll update on input blur
    $(':submit').hide();
    
    // prevent enter from submitting form
    $('form').submit(function(e) {
        e.preventDefault();                 
    });
    
    // add extra table cells for validation errors/success feedback
    $('#people tr').each(function() {
       $(this).append('<td class="feedback"></td>');                  
    });
    
    // validate/update on text input blur
    $(':text').blur(function() {
        
        var $row = $(this).closest('tr');
        var firstName = $('.firstname', $row).val();
        var surname = $('.surname', $row).val();
        
        var person = {
            firstName: firstName,
            surname: surname,
            index: $row.index() -1
        };
        
        if(TechTest.validatePerson(person, $row)) {
            
            // do the shizzle
            
            TechTest.updatePerson(person, function() {
                var $success = $('<span class="success">Updated!</span>');
                setTimeout(function() { 
                    $success.fadeOut(); 
                }, 2000);

                $('.feedback', $row).html($success);                
            });

        }
        
    });
    
};

TechTest.updatePerson = function(person, callback) {
    
    $.ajax({
        url: TechTest.updateUrl + '/' + person.index,
        data: {
            'first_name' : person.firstName,
            'surname' : person.surname
        },
        cache: false,
        type: 'GET',
        success: function (response) {
            if(callback) callback();
        },
        error: function (xhr) {
            alert('Update failed.');
        }
    }); 
    
    
};

TechTest.validationError = function(error, $row) {
    $('.feedback', $row).html('<span class="error">' + error + '</span>');
};

TechTest.validatePerson = function(person, $row) {
    
    if(!person.firstName) {
        
        TechTest.validationError('Enter a first name', $row);
        return false;
        
    } else if(!person.surname) {
        
        TechTest.validationError('Enter a surname', $row);
        return false;
        
    } else {
        
        return true;
        
    }
    
};

$(function() {
    TechTest.init();
});
