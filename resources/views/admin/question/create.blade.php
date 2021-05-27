<x-app-layout>
    <x-slot name="header">{{$quiz->title}} için soru oluştur</x-slot>


    <div class="card">
        <div class="card-body">
            <form action="{{route('questions.store',$quiz->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Soru</label>
                    <textarea name="question" class="form-control" rows="4s">{{old('question')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Fotoğraf</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">1.Cevap</label>
                            <textarea name="answer1" id="" class="form-control" rows="2">{{old('answer1')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">2.Cevap</label>
                            <textarea name="answer2" id="" class="form-control" rows="2">{{old('answer2')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">3.Cevap</label>
                            <textarea name="answer3" id="" class="form-control" rows="2">{{old('answer3')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">4.Cevap</label>
                            <textarea name="answer4" id="" class="form-control" rows="2">{{old('answer4')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Doğru Cevap</label>
                    <select name="correct_answer" id="" class="form-control">
                        <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">1. Cevap</option>
                        <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">2. Cevap</option>
                        <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">3. Cevap</option>
                        <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">4. Cevap</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-grid gap-2">
                        <label for=""></label>
                        <button type="submit" class="btn btn-primary">Soru Oluştur</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
