const buttonRight = document.getElementById('rightbt');
    const buttonLeft = document.getElementById('leftbt');

    rightbt.onclick = function () {
      document.getElementsByClassName('datetrain').scrollLeft += 20;
    };
    rightbt.onclick = function () {
      document.getElementsByClassName('datetrain').scrollRight -= 20;
    };