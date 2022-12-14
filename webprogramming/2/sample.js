var timer = 301;
var gamePos = new Array(4);
gamePos = [1,2,3,4];
width = 10;
tile_id = 5;
// solved = true;
// if(solved){
//   setTimeout(function() {window.location.replace("./winpage.html");}, 500);
//   //window.location.replace("./winpage.html");
// }
const functions = {
    resetBoard: ()=>{
        gameTimer().clearInterval();
        //event.preventDefault();
        startGame();
        configureGame();
      },
      gameTimer: () => {
        var interval = setInterval(function() {
          document.getElementById('remaintime_div').innerHTML = --timer;
          if (timer <= 0)
          {
             document.getElementById('remaintime_div').innerHTML = "Game over";
             clearInterval(interval);
          }
          }, 1000);
      },
      changeTiles: (i,j,k,l) => {
        var temp = new Object();
        temp = gamePos[i][j];
        gamePos[i][j] = gamePos[k][l];
        gamePos[k][l] = temp;
      },
      isSolvable: (width, height, emptyRow) => {
        if (width % 2 == 1) {
            true;
        } else {
          false;
        }
      },
      calculateSum: () => {
        var inversions = 0;
        for (var j = 0; j < tile_id; ++j) {
          for (var i = 0; i < tile_id; ++i) {
            //inversions += calculateTransitions(i, j);
          }
        }
        return 0;
      },
      
    calculateTransitions : (i, j) => {
    var inversions = 0;
    var tileNum = j * tile_id + i;
    var lastTile = tile_id * tile_id;
    var tileValue = gamePos[i][j].y * tile_id + gamePos[i][j].x;
    for (var q = tileNum + 1; q < lastTile; ++q) {
      var k = q % tile_id;
      var l = Math.floor(q / tile_id);
  
      var compValue = gamePos[k][l].y * tile_id + gamePos[k][l].x;
      if (tileValue > compValue && tileValue != (lastTile - 1)) {
        ++inversions;
      }
    }
    return inversions;
  }
};
  module.exports = functions;