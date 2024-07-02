$(document).ready(function(){
    $('#search').on('keyup', function(){
        var query = $(this).val();
        $.ajax({
            url: "search",
            type: "GET",
            data: {'search': query},
            success: function(data){
                $('#search_list').html(data);
                $('.search-results-container').slideDown(); // Mostrar resultados con efecto de deslizamiento
            }
        });
    });
    $('#search').on('click', function(){
        var query = $(this).val();
        if (query.length >= 2) {
            $('.search-results-container').slideDown(); // Mostrar resultados con efecto de deslizamiento
        }
    });
    // Ocultar resultados al hacer clic fuera del contenedor de búsqueda
    $(document).on('click', function(e){
        if (!$(e.target).closest('.search-bar').length) {
            $('.search-results-container').slideUp(); // Ocultar resultados con efecto de deslizamiento
        }
    });
});