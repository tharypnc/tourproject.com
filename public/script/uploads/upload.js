/**
 * Created by Thary on 18/11/17.
 */

/*
 *Function Check Extension
 * @param Array ext
 * @param string fileName
 */
var extensionType = function (ext,fileName){

    var allowed_extensions = ext;
    var file_extension = fileName.split('.').pop().toLowerCase();

        if($.inArray(file_extension, allowed_extensions) == -1)
        {
            return false; // valid file extension
        }

    return true;

}

/*
 *Function Check Size File
 * @param Number size
 */

var fileSize =  function (size,allowSize){

      var max_size  = allowSize * (1024*1024);

      if(size <= max_size ){

          return true;
      }

    return false;
}
