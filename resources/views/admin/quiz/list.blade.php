<x-app-layout>
    <x-slot name="header">
        Quizler
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"> Quiz Oluştur</a>
            </h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz)
                    <tr>
                        <td scope="row">{{$quiz->title}}</td>
                        <td>{{$quiz->status}}</td>
                        <td>{{$quiz->finished_at}}</td>
                        <td>
                            <a href="{{ route('quizzes.edit',['id'=>$quiz->id]) }}" class="btn btn-sm btn-primary">Düzenle</a>
                            <a href="{{ route('quizzes.destroy',['id'=>$quiz->id]) }}" class="btn btn-sm btn-danger">Sil</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$quizzes->links()}}

        </div>
    </div>


</x-app-layout>
