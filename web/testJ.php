<html>
  <script type="text/javascript">
      function displayIt(args){
          var output = "";
          if(typeof args.name == "string"){
              output += "name" + args.name; 
          }
          
          if(typeof args.age == "number"){
              output += "age" + args.age;
          }
          alert(output);
      }
      function testArray(){
          var colors = new Array();
          colors = ['red', 'blue', 'black'];
          //alert(colors[1]);
          //alert(colors.length);
          //alert(colors.valueOf());
          alert(Array.isArray(colors));
          alert(colors.join('0'));
          alert(colors.sort());
      }
      
      testArray();

</script>  
</html>
