<head>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Data Mahasiswa</title> 
<style> 
table{ 
    border-collapse: collapse; 
    border-spacing: 0; 
    width: 100%; 
    border: 1px solid #ddd; 
    }
    thead { 
        background-color: #f2f2f2; 
        }
        th, td {
             text-align: left; 
             padding: 8px; 
             }tr:nth-child(even){background-color: #f2f2f2} 
             .tambah{ 
                 padding: 8px 16px ; 
                 text-decoration: none; 
                 }
                 </style> 
                 </head> 
                 <body>
                 <div style="overflow-x:auto;">
                  <a class="tambah" href="{{ route('tambah0250.create') }}"> Tambah Data </a>
                   <table>
                    <thead>
                     <tr>
                      <th>ID Rak</th>
                      <th>Judul</th> 
                      <th>Tahun Terbit</th> 
                      <th>Jenis</th>
                      <th>Aksi</th> </tr> 
                    </thead> 
                    <tbody>
                     <?php $no=1; ?>
                      @foreach ($perpustakaan as $pp)
                       <tr>
                       <td>{{$pp->id}}</td> 
                       <td>{{$pp->judul}}</td> 
                       <td>{{$pp->tahun_terbit}}</td>
                       <td>{{$pp->jenis}}</td>
                       <td>
                       <a href="{{ url('perpustakaan/' . $pp->id . "/edit") }}">Edit </a>
                       |
                       <form action="{{ url('perpustakaan/' . $pp->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit">Delete</button>
                        </form> 
                       </td> 
                    </tr> 
                    @endforeach 
                </tbody> 
            </table> 
        </div> 
    </body>