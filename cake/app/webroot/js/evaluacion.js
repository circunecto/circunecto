$(document).ready(function() {

  $('.encuesta-siguiente').click(function(){
    pregunta_actual = get_pregunta_actual();
    index = pregunta_actual;
    pregunta_actual  = $('.question_ul li').eq(pregunta_actual);

    is_radio =  $('.radio', pregunta_actual);

    if( is_radio.length > 0 ) {
      //Solo vamos a validar los campos con radio por que los sliders tienen
      //un valor por defecto
      val = $('input[type=radio]', pregunta_actual).is(':checked');
      
      //Si ninguno tiene "checked"
      //No avanzamos el cuestionario
      if(val == false) {
        $('.pregunta-error').remove();
        $('.preguntas-test').append('<div class="pregunta-error">Debes de seleccionar una opción</div>');
        return false;
      }
    }

    //Si llegamos hasta aquí es que todo ha ido bien
    $('.pregunta-error').remove();
    $('input[value=Next]').trigger('click');

    //actualizando barra de progreso
    update_bar( index );

    total = $('.question_ul li').length;

    if( total == index + 1 ) {
      $('.pop-up-mail').css("display","block");
    } 

    return false;
  });


  evaluacion = $('#EvaluacionVerForm');
  $('input[type=radio]',evaluacion).click(function(){
    pregunta_actual = get_pregunta_actual();
    index = pregunta_actual;

    //Cuando se escoja un valor para las preguntas
    //tipo radio automaticamente saltamos a la siguiente
    $('.pregunta-error').remove();
    $('input[value=Next]').trigger('click');
    update_bar(index);
    total = $('.question_ul li').length;

    if( total == index + 1 ) {
      $('.pop-up-mail').css("display","block");
    } 
  });
});

get_pregunta_actual = function() {
    //Total de preguntas
    total = $('.question_ul li').length;

    //size de una pregunta
    size = 630;

    pregunta_actual =  $('.question_ul').css('left');

    pregunta_actual.replace("px","");
    if( pregunta_actual == "auto") {
      pregunta_actual = 0;
    }

    pregunta_actual  = Math.abs(parseInt(pregunta_actual)) / size;

    return pregunta_actual;

}

update_bar = function( actual ) {
  
    //no contamos el 0
    actual = actual + 1;

    //Total de preguntas
    total = $('.question_ul li').length;

    progreso = (actual / total) * 100;
    progreso = Math.round(progreso);

    $('.porcentaje p').text(progreso+"%");

    $('.barra').css('width',progreso + "%");
    
}
