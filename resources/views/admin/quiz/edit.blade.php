<x-app-layout>
    <x-slot name="header">
        Quiz Güncelle
    </x-slot>


    <div class="card">
        <div class="card-body">
            <form action="{{route('quizzes.update',['id'=>$quiz->id])}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$quiz->title}}">
                </div>
                <div class="form-group">
                    <label for="">Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows="4s">{{$quiz->description}}</textarea>
                </div>
                <div class="form-group">
                    <input id="isFinished" @if($quiz->finished_at) checked @endif type="checkbox">
                    <label for="">Bitiş Tarihi Olacak mı?</label>
                </div>
                <div id="finishedInput" @if(!$quiz->finished_at) style="display: none" @endif class="form-group">
                    <label for="">Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" @if($quiz->finished_at) value="{{date('Y-m-d\TH:i',strtotime($quiz->finished_at))}}" @endif class="form-control">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Quiz Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function () {
                if ($('#isFinished').is(':checked')) {
                    $('#finishedInput').show()
                } else {
                    $('#finishedInput').hide()
                }
            })
        </script>
    </x-slot>
</x-app-layout>
