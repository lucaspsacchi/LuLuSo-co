valores = []

if (dados['respondidas'] == 0) {
  valores['correto'] = 0.00;
  valores['incorreto'] = 0.00;
  valores['respondidas'] = 0.00;
}
else {
// Correto
aux  = dados['correto'] / dados['total']
valores['correto'] = parseFloat(aux.toFixed(2))

// Incorreto
aux  = dados['incorreto'] / dados['total']
valores['incorreto'] = parseFloat(aux.toFixed(2))

// Total
aux  = dados['respondidas'] / dados['total']
valores['respondidas'] = parseFloat(aux.toFixed(2))
}

// Níveis escritos
var msgNiveis


var bar = new ProgressBar.Circle('#porc1', {
  color: '#aaa',
  // This has to be the same size as the maximum width to
  // prevent clipping
  strokeWidth: 4,
  trailWidth: 4,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#3e9b8a', width: 4 },
  to: { color: '#3e9b8a', width: 4 },
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('0%');
    } else {
      circle.setText(value + '%');
    }

  }
});
bar.text.style.fontSize = '4rem';
bar.animate(valores['respondidas']);

var bar = new ProgressBar.Circle('#porc2', {
  color: '#aaa',
  // This has to be the same size as the maximum width to
  // prevent clipping
  strokeWidth: 4,
  trailWidth: 4,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#3e9b8a', width: 4 },
  to: { color: '#3e9b8a', width: 4 },
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('0%');
    } else {
      circle.setText(value + '%');
    }

  }
});
bar.text.style.fontSize = '4rem';
bar.animate(valores['correto']);

var bar = new ProgressBar.Circle('#porc3', {
  color: '#aaa',
  // This has to be the same size as the maximum width to
  // prevent clipping
  strokeWidth: 4,
  trailWidth: 4,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#3e9b8a', width: 4 },
  to: { color: '#3e9b8a', width: 4 },
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('0%');
    } else {
      circle.setText(value + '%');
    }

  }
});
bar.text.style.fontSize = '4rem';
bar.animate(valores['incorreto']);