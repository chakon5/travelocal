@extends('layouts.app')
<style>

/* .grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'main main main main main main';
  gap: 10px;
  background-color: #2196F3;
  padding-left: 10px;
  padding-left: 80px;
  padding-right: 80px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: left;
}

input[type=text], select {
    width: 450px;
    padding: 12px;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin: 8px 0;
}

input[type=number], select {
    width: 450px;
    padding: 12px;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin: 8px 0;
}

input[type=date], select {
  width: 450px;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.A {
    margin-left: 500px;
    font-size: 20px;
}

.item3 { 
    grid-area: main;
    height: auto;
    padding-left: 70px;
    font-size: 16px;
} */

.button1 {
    margin-top: 23px;
}

.reservation {
    margin: 0 150px ;
    margin-top: 20px;
    font-size: 20px;
}

.col {
    margin: 15px 0;
}

.tableft {
    position: absolute;
    margin-top: 50px;
    margin-left: 60px;
    /* top: 38%; */
    /* left: 50%; */
    width: 200px;
    height: 50px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #3C8085;
    color: white;
    font-size: 17px;
    /* padding: 10px 30px; */
    padding-left: 20px;
    padding-top: 13px;
    border: none;
    cursor: pointer;
    border-radius: 45px;
    text-align: center;
}

.tableft:hover {
    background-color: #444444;
    color: white;
}

.tableft-1 {
    position: absolute;
    margin-top: 110px;
    margin-left: 60px;
    /* top: 38%; */
    /* left: 50%; */
    width: 200px;
    height: 50px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #3C8085;
    color: white;
    font-size: 17px;
    /* padding: 10px 30px; */
    padding-left: 20px;
    padding-top: 13px;
    border: none;
    cursor: pointer;
    border-radius: 45px;
    text-align: center;
}

.tableft-1:hover {
    background-color: #444444;
    color: white;
}

.btn-1 {
    position: absolute;
    margin-top: 50px;
    margin-left: 90px;
    /* top: 38%; */
    /* left: 50%; */
    width: 180px;
    height: 60px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #3C8085;
    color: white;
    font-size: 25px;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 45px;
    text-align: center;
}

.btn-1:hover {
    background-color: #444444;
    color: white;
}

</style>

@section('content')

@endsection