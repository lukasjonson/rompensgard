var anchor_links = document.querySelectorAll('a');

for (var i = 0; i < anchor_links.length; i++) {
    anchor_links[i].addEventListener('click', function () {
        location.reload();
    });
}

var url = window.location.href.split('/')[3];

var navItems = document.querySelectorAll('.nav__list .nav__item a');

if (url == '') {
    navItems[0].classList.add('active');
} else if (url == 'getyoga') {
    navItems[1].classList.add('active');
} else if (url == 'gardsbutik') {
    navItems[2].classList.add('active');
} else if (url == 'blogg') {
    navItems[3].classList.add('active');
} else if (url == 'recept') {
        navItems[4].classList.add('active');
} else if (url == 'kontakt') {
    navItems[5].classList.add('active');
}




$(document).ready(function () {
    var contactSubject = document.querySelectorAll('#contact-subject-dropdown option');
    var disabledOption = contactSubject[0];
    if (typeof (disabledOption) != 'undefined' && disabledOption != null) {
        disabledOption.setAttribute('disabled', 'true');
    }
});

var dashboardLink = document.querySelector('#dashboard-panel-link .fa');
var dashboardText = document.querySelector('#dashboard-panel-text');

if (typeof (dashboardLink) != 'undefined' && dashboardLink != null) {
    dashboardLink.addEventListener('mouseover', function () {
        dashboardText.style.opacity = 1;
    });

    dashboardLink.addEventListener('mouseout', function () {
        dashboardText.style.opacity = 0;
    });
}




            var pen = document.querySelectorAll('.container .left p');
for(var i = 0; i < pen.length; i++){
pen[i].setAttribute("class", "p");
}

    $(document).ready(function(){
            window.addEventListener('scroll', function(){
                var s = $(document).scrollTop();
                $('#container .h1-wrapper').css("transform", "translateY(" + (s/4) + "px)");
        })
        $('#delete-confirmation-box').hide();
        $('#darken-screen').hide();
    });


var deletePostButton = document.querySelector('.delete-post-button');
var closeConfirmationBox = document.querySelector('.close-confirmation-box');

if (typeof(deletePostButton) != 'undefined' && deletePostButton != null){
deletePostButton.addEventListener('click', function(){
    $('#delete-confirmation-box').show();
    $('#delete-confirmation-box').css('visibility', 'visible');
    $('#darken-screen').show();
    $('#darken-screen').addClass('darken-screen-css');
});
}

if (typeof(closeConfirmationBox) != 'undefined' && closeConfirmationBox != null){
closeConfirmationBox.addEventListener('click', function(){
    $('#darken-screen').removeClass('darken-screen-css');
    $('#darken-screen').hide();
    $('#delete-confirmation-box').hide();
    $('#delete-confirmation-box').css('visibility', 'hidden');
});
}

var successBox = document.querySelector('.success-message');
var errorBox = document.querySelector('.error-message');

if (typeof(successBox) != 'undefined' && successBox != null){
    setTimeout(function(){
        successBox.classList.add('hide-success-message');
    }, 2000);
}

if (typeof(errorBox) != 'undefined' && errorBox != null){
    setTimeout(function(){
        errorBox.classList.add('hide-error-message');
    }, 2000);
}

$('#recipe-table').hide();

var switchInput = document.querySelectorAll('.switch-input');

for(var i = 0; i < switchInput.length; i++){
    switchInput[i].addEventListener('click', function(){

        if($('#week').is(':checked')) { 
        var id = document.querySelectorAll('.post_id_recipe');
        document.querySelector('.recipe-trash').classList.remove('fill-trash');
        for(var i = 0; i < id.length; i++){
            id[i].checked = false;
        }
            $('#post-table').show();
            $('#recipe-table').hide();
            $('#recipe-table').css('visibility', 'hidden');
        }
        
        if($('#month').is(':checked')) { 
            var id = document.querySelectorAll('.post_id');
            document.querySelector('.post-trash').classList.remove('fill-trash');
        for(var i = 0; i < id.length; i++){
            id[i].checked = false;
        }
            $('#recipe-table').css('visibility', 'visible');
            $('#recipe-table').show();
            $('#post-table').hide();
        }
    });
}



$('document').ready(function(){
    var checkedIds = [];
    var deleteMultipleBtn = document.querySelector('#delete_btn');
    var id = document.querySelectorAll('.post_id');
    
    window.addEventListener('click', function(){
        anyChecked = [];
                for(var i = 0; i < id.length; i++){
                    if(id[i].checked == true){
                        anyChecked.push(id[i]);
                    }
                }
                if(anyChecked.length > 0){
                    document.querySelector('.post-trash').classList.add('fill-trash');
                } else {
                    document.querySelector('.post-trash').classList.remove('fill-trash');
                }
        });

    deleteMultipleBtn.addEventListener('click', function(){
        for(var i = 0; i < id.length; i++){
            if(id[i].checked == true){
                checkedIds.push(id[i].value);
            }
        }
        if(checkedIds.length != 0){
            checkedIds.forEach(id => {

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:'DELETE',
                    url:'/blogg/'+ id,
                    data:'_token = <?php echo csrf_token() ?>',
                    success:function(data){
                        $("#msg").html(data.msg);
                    }
                });
            });
            
            setTimeout(function(){
                location.reload();
            }, 400);
        }
    });
});

$('document').ready(function(){
    var checkedIdsRecipe = [];
    var deleteMultipleBtn = document.querySelector('#delete_btn_recipe');
    var id = document.querySelectorAll('.post_id_recipe');

    window.addEventListener('click', function(){
        anyChecked = [];
                for(var i = 0; i < id.length; i++){
                    if(id[i].checked == true){
                        anyChecked.push(id[i]);
                    }
                }
                if(anyChecked.length > 0){
                    document.querySelector('.recipe-trash').classList.add('fill-trash');
                } else {
                    document.querySelector('.recipe-trash').classList.remove('fill-trash');
                }
        });

    deleteMultipleBtn.addEventListener('click', function(){
        for(var i = 0; i < id.length; i++){
            if(id[i].checked == true){
                checkedIdsRecipe.push(id[i].value);
            }
        }
        if(checkedIdsRecipe.length != 0){

            checkedIdsRecipe.forEach(id => {

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:'DELETE',
                    url:'/recept/'+ id,
                    data:'_token = <?php echo csrf_token() ?>',
                    success:function(data){
                        $("#msg").html(data.msg);
                    }
                });
            });
            
            setTimeout(function(){
                location.reload();
            }, 400);
        }
    });

});

var navButton = document.querySelector('#mobile-navigation-button');

navButton.addEventListener('click', function(){
    $('#mobile-navigation-nav').animate({width: 'toggle', marginLeft: 0}, {duration:600});
});

var mobileNavItem = document.querySelectorAll('.mobile-nav-item');

for(var i = 0; i < mobileNavItem.length; i++){
    mobileNavItem[i].style.animationDuration = 1 + i/6 + 's';
}