@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="margin-left: 50px;">
        <div>
            <div><br>
                <div><font color="#1966cb" size="6"><b>SAFETY DATA<br>SHEETS / MSDS</b></font><br>
                <font color="#424242"><br>Here you will be able to find the latest SDS
                <br>in Flottec’s site. </font> <br><br></div>

                <input class="generated" value="" placeholder="Search" id="search" name="search">&emsp;<img src="images/search.svg">

                <br><br>
                <div>
                @if (session('success'))
                        <div class="alert alert-warning">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if (count($products) > 0)
                    <table class="spacerows" cellspacing="0"><tr>
                        @foreach ($products as $i => $product)
                            @if (($i%2) == 0 && $i != 0 )
                                </tr><tr></tr><tr>
                                @endif
                                <td><div style="border-style: solid; border-right: hidden;">
                                
                                <br><font color="#424242" size="3">&emsp;&emsp;Product:&emsp;&emsp;</font><br>
                                    <b><font color="black" size="4">&emsp;&emsp;{{ $product->name }}&emsp;&emsp;</font></b><br><br>
                                    <font color="#424242" size="3">&emsp;&emsp;Type:&emsp;&emsp;</font><br>
                                    <b><font color="black" size="4">&emsp;&emsp;{{ $product->category }}&emsp;&emsp;</font></b><br><br></td></div><td><div style="border-right: solid;">

                    <table>

                    @if ($product->safety_sheets->english_sheet)
                       <tr> <td><p>&emsp;&emsp;English safety sheet: </p></td><td>&emsp;&emsp;</td><td><a class="btn btn-xs btn-primary" target="_blank" href="{{ Storage::url($product->safety_sheets->english_sheet) }}">Download</a>&emsp;&emsp;<td></tr>
                    @endif
                    @if ($product->safety_sheets->spanish_sheet)
                        <tr> <td><p>&emsp;&emsp;Spanish safety sheet: </p></td><td>&emsp;&emsp;</td><td><a class="btn btn-xs btn-primary" target="_blank" href="{{ url('download/'.$product->safety_sheets->spanish_sheet) }}">Download</a>&emsp;&emsp;</td></tr>
                    @endif

                    <tr> <td><p>&emsp;&emsp;Tech sheet: </p></td><td>&emsp;&emsp;</td><td><a class="btn btn-xs btn-primary" target="_blank" href="{{ url('/download/'.$product->tech_sheet->tech_sheet) }}">Download</a>&emsp;&emsp;</td></tr>

                    </div></table>
                    

                            </td><td>&emsp;&emsp;</td></td>
                        @endforeach
                        </tr></table>
                    @else
                        <p>There are no registered products yet</p>
                    @endif
                    <br><br><br>

                </div>
            </div>
        </div>
        <br><br><div style="margin-left: 950px;"><font color="#1966cb" size="4"><b><a href="">VIEW MORE</a></b></font></div>
    </div><br>

@endsection








