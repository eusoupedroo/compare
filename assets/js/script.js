// CEP Index Page Tranfers
$(document).ready(function() {
    $(".searchButton").on("click", function() {
        var cep = $(".searchBox").val();
        console.log(cep);
        return false;
    });
});

// Suggestions Product List Itens
$(document).ready(function() {
    $('#itemList').keyup(function() {
        var product = $("#itemList").val();
        if(product != ''){
            $.post("includes/handlers/ajax/searchItem.php", { product: product })
            .done(function(data) {
                if(data != "") {
                    var suggestions = JSON.parse(data);
                    var html = "";
                    for (var i = 0; i < suggestions.length; i++) {
                        html += '<div class="suggestion" onclick="selectSuggestion(\'' + suggestions[i] + '\')">' + suggestions[i] + '</div>';
                    }
                    $("#suggestion-box").html(html);
                }
            });
        } else {
            $("#suggestion-box").html("");
        }
    });
});

// Select Options Item
function selectSuggestion(value) {
    $("#itemList").val(value);
    $("#suggestion-box").html("");
}

// Defining the width of the suggestion-box
$(document).ready(function() {
    $('#itemList').keyup(function() {
        var product = $("#itemList").val();
        var inputWidth = $("#itemList").width();
        if(product != ''){
            $.post("includes/handlers/ajax/searchItem.php", { product: product })
            .done(function(data) {
                if(data != "") {
                    var suggestions = JSON.parse(data);
                    var html = "";
                    for (var i = 0; i < suggestions.length; i++) {
                        html += '<div class="suggestion" onclick="selectSuggestion(\'' + suggestions[i] + '\')">' + suggestions[i] + '</div>';
                    }
                    $("#suggestion-box").html(html);
                    $("#suggestion-box").css("width", inputWidth);
                }
            });
        } else {
            $("#suggestion-box").html("");
        }
    });
});


// Creating the items List 
var items = [];
$('#addItemForm').submit(function(event) {
  event.preventDefault();
  var item = $('input[name="itemList"]').val();
  items.push(item);
  console.log('Array de itens:', items);
  
  $.ajax({ 
    url: 'includes/handlers/cart-content.php',  
    type: 'POST', 
    data: {itemList: items}, 
    success: function(response) {
      console.log('Dados enviados com sucesso!');
      console.log(response);
    },
    error: function(error) {
      console.error('Erro ao enviar dados: ' + error);
    }
  });

  $('input[name="itemList"]').val('');
});

// Remove Item List 
$(document).ready(function(){
    $(".trackOptions img").on("click", function(){
        var item_list = $(this).attr("name");
        console.log(item_list);
        $.ajax({
            type: 'POST',
            url: 'includes/handlers/remove-item-cart.php',
            data: {item: item_list },
            success: function(response){
                console.log(response);
                location.reload();
            }
        });
    });
});

function useCepRegister() {
    document.getElementsByName('cep')[0].value = '14600000';
    document.forms[0].submit();
}

// Logout 
function logout() {
	$.post("includes/handlers/ajax/logout.php", function() {
		location.reload();
	});
}