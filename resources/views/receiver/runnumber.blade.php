
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- <div style="border-style:solid;"> -->
{!! Form::model($receiver,['route' => ['runnumberstore',$receiver->id], 'method' => 'post'] ) !!}
<input id="getx" name="getx" type="hidden" value="" />
<input id="gety" name="gety" type="hidden" value="" />

<img src="http://203.113.14.20:3000/send/{{$receiver->signature}}" style="border-style:groove;" onclick='clickHotspotImage(event)' />

    <button style="position: absolute; top: 20px; right: 180px;" type="submit" class="btn btn-outline-primary">ยืนยัน</button>
    <button style="position: absolute; top: 20px; right: 100px;" type="reset" class="btn btn-outline-danger" onclick="window.history.back();">ยกเลิก</button>
<!-- </div> -->
{!! Form::close() !!}
<script>
        window.nu = 0;
        let coor = [];
        let count = 0;

    function clickHotspotImage(event) {
            var xCoordinate = event.offsetX;
            var yCoordinate = event.offsetY;
            // alert(xCoordinate)
            // alert(yCoordinate)
            document.getElementById("getx").value = xCoordinate;
            document.getElementById("gety").value = yCoordinate;
            check(xCoordinate,yCoordinate);
            //console.log(xCoordinate + ',' + yCoordinate)
        }

        // function clearCircle(){
        //     for(i in circlelist){
        //     document.body.removeChild(circlelist[i]);
        //     }
        //     circlelist = new Array();
        // }


        function check(x,y){
            // alert(nu);
            // window.nu = 0;
            if(nu == 0){
                // alert(nu);
                // clickHotspotImage(event);
                photoclick(x,y);

            }
            else{
                // alert(nu);
                document.body.removeChild(c1);
                nu = 0;
                photoclick(x,y);
            }
        }

        function photoclick(x,y){
            // alert(nu);
            // var circlelist = new Array();
            c1 = document.createElement("img");
            c1.src = "http://203.113.14.20:3000/send/html/{{$receiver->id}}.png";
            c1.style.position = "absolute";
            c1.style.left = x+"px";
            c1.style.top = y+"px";
            // c1.style.width = "20px";
            // c1.style.height = "20px";
            document.body.appendChild(c1);
            // circlelist.push(c1);

            nu++;
            // alert(nu);
        }
    </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
