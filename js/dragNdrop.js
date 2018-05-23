

// /**
// // ||||||||||||||||||||||||||||||| \\
// //	Drag and Drop code for Upload
// // ||||||||||||||||||||||||||||||| \\
// **/

// var dragdrop = {
//     init: function (elem) {
//         elem.setAttribute('ondrop', 'dragdrop.drop(event)');
//         elem.setAttribute('ondragover', 'dragdrop.drag(event)');
//     },
//     drop: function (e) {
//         e.preventDefault();
//         var file = e.dataTransfer.files[0];
//         runUpload(file);
//     },
//     drag: function (e) {
//         e.preventDefault();
//     }
// };
// document.getElementById('userActions').ondrop = dragdrop.drop(event);
// document.getElementById('userActions').ondrag = dragdrop.drag(event);

// function runUpload(file){
//     if (file.type === 'image/png' ||
//         file.type === 'image/jpg' ||
//         file.type === 'image/jpeg' ||
//         file.type === 'image/gif' ||
//         file.type === 'image/bmp') {

//         var reader = new FileReader(),
//             image = new Image();
//         reader.readAsDataURL(file);
//         reader.onload = function (_file) {
//             document.getElementById('dropImage').src = _file.target.result;
//             document.getElementById('dropImage').style.display = 'inline';
//             console.log(_file.target.result);
//         } // END reader.onload()
//     } // END test if file.type === image
// }

// /**
// // ||||||||||||||||||||||||||||||| \\
// //	window.onload fun
// // ||||||||||||||||||||||||||||||| \\
// **/
// window.onload = function () {
//     if (window.FileReader) {
//         // Connect the DIV surrounding the file upload to HTML5 drag and drop calls
//         dragdrop.init($('userActions').el);
//         //	Bind the input[type="file"] to the function runUpload()
//         $('fileUpload').onChange(function () { runUpload(this.files[0]); });
//     } else {
//         // Report error message if FileReader is unavilable
//         var p = document.createElement('p'),
//             msg = document.createTextNode('Sorry, your browser does not support FileReader.');
//         p.className = 'error';
//         p.appendChild(msg);
//         $('userActions').el.innerHTML = '';
//         $('userActions').el.appendChild(p);
//     }
// };