//https://gist.github.com/sjwilliams/3929462

// Based on pieces from this thread:
// http://stackoverflow.com/questions/1881716/merging-jquery-objects
// use: var currentRowEls = []; // array of various jQ ojbects
//      mergeSelectors(currentRowEls).css({width:'200px'});

function mergeSelectors(objs) {
    var ret = objs.shift();
    while (objs.length) {
        ret = ret.add(objs.shift());
    }
    return ret;
};
