<form action="{{ route('form1.send') }}" method="post" >
    @csrf
<label>Original Array:</label>
<input type="text" name="ogArr">
<label>Input: </label>    
<input type="number" name="num1">
<label>Position</label>    
<input type="number" name="num2">
<label>Insert Text </label>    
<input type="text" name="text1">
<input type="submit" name="submitted">
</form>

@if (isset($submitted))
@php
$arr = [1, 2, 3, 4, 5];
$temp = trim($ogArr);
$newArr = [];
for($i = 0; $i < strlen($temp) ; $i++)
 {
    array_push($newArr,$temp[$i]);
 }

if($input % 2== 0) 
{
    $arr = [1, 2, 3, 4, 5 , 6];

}
else $arr = [1,2,3,4,5,6,7];
print_r($newArr);
array_splice($arr, $position, 0, $text);




@endphp

@foreach ($arr as $item)
{{$item . ' '}}
@endforeach


@endif