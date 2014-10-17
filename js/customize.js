
$(document).ready(function() { 
  
  var __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };
  
var PaintInterface;
    PaintInterface = (function() {

      PaintInterface.prototype.options = {
        tiles: 10,
        tileSize: 10,
        width: 200,
        height: 200
      };
      
      PaintInterface.prototype.drawnTiles = [];

      PaintInterface.prototype.colors = ["ff0000", "ffa500", "ffff00", "00ff00", "00ffff", "0000ff", "a200ff", "ff00ff", "ffffff", "aaaaaa", "555555", "000000"];

      function PaintInterface(colorPitSelector, paperSelector, clearButtonSelector, downloadButtonSelector, options) {
        if (options == null) options = {};
        this.clearPaper = __bind(this.clearPaper, this);
        this.previewPaper = __bind(this.previewPaper, this);
        this.downloadImage = __bind(this.downloadImage, this);
        this.drawOnClick = __bind(this.drawOnClick, this);
        this.prepareCanvas = __bind(this.prepareCanvas, this);
        this.colorPit = $(colorPitSelector);
        this.paper = $(paperSelector);
        this.clearButton = $(clearButtonSelector);
        this.downloadButton = $(downloadButtonSelector);
        this.setOptions(options);
        this.brushColor = this.colors[0];
        this.preparePaper();
        this.prepareCanvas();
        this.prepareColorPit();
        this.bindEvents();
      }

      PaintInterface.prototype.setOptions = function(options) {
        var option, value;
        for (option in options) {
          value = options[option];
          this.options[option] = value;
        }
        return this.options.width = this.options.height = this.options.tileSize * this.options.tiles;
      };

      PaintInterface.prototype.prepareCanvas = function() {
        this.canvasElement = $("<canvas/>");
        return this.canvasElement.attr({
          width: this.options.width,
          height: this.options.height
        });
      };

      PaintInterface.prototype.preparePaper = function() {
        var i, _ref;
        for (i = 0, _ref = this.options.tiles * this.options.tiles; 0 <= _ref ? i < _ref : i > _ref; 0 <= _ref ? i++ : i--) {
          $("<div class='tile'/>").appendTo(this.paper);
        }
        return this.paper.css({
          "width": this.options.width + (this.options.tiles + 1)
        });
      };

      PaintInterface.prototype.prepareColorPit = function() {
        var _this = this;
        return this.colors.forEach(function(color) {
          return $("<div/>").css('background', "#" + color).prop("class", "color").data("color", "" + color).appendTo(_this.colorPit);
        });
      };

      PaintInterface.prototype.bindEvents = function() {
        var _this = this;
        this.colorPit.on("click", ".color", function(e) {
          return _this.brushColor = $(e.currentTarget).data("color");
        });
        this.clearButton.click(this.clearPaper);
        this.downloadButton.click(this.downloadImage);
        return this.paper.on("click", ".tile", this.drawOnClick);
      };

      PaintInterface.prototype.drawOnClick = function(e) {
        var $target, x, y;
        $target = $(e.currentTarget);
        $target.css('background', "#" + this.brushColor);
        x = Math.floor($target.prevAll().length % this.options.tiles);
        y = Math.floor($target.prevAll().length / this.options.tiles);
        return this.drawnTiles.push({
          x: x,
          y: y,
          color: this.brushColor
        });
      };

      PaintInterface.prototype.downloadImage = function() {
        var canvas, context, tile, _i, _len, _ref;
        canvas = this.canvasElement[0];
        context = canvas.getContext("2d");
        context.clearRect(0, 0, this.options.width, this.options.height);
        _ref = this.drawnTiles;
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          tile = _ref[_i];
          context.fillStyle = tile.color;
          context.lineWidth = 0;
          context.fillRect(tile.x * this.options.tileSize, tile.y * this.options.tileSize, this.options.tileSize, this.options.tileSize);
        }
        return window.location.href = canvas.toDataURL("image/png");
      };

      PaintInterface.prototype.previewPaper = function(e) {
        var tile, _i, _len, _ref, _results;
        this.context.clearRect(0, 0, this.options.width, this.options.height);
        _ref = this.drawnTiles;
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          tile = _ref[_i];
          _results.push(this.drawTile(tile.x, tile.y, tile.color));
        }
        return _results;
      };

      PaintInterface.prototype.clearPaper = function(e) {
        return this.paper.find(".tile").css("background-color", "#FFF");
      };

      return PaintInterface;

    })();
    return new PaintInterface(".colorpit", ".paper", "button.clear", "button.download", {
      tiles: 8,
      tileSize: 30
    });
});