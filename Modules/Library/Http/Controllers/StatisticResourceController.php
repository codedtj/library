<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Modules\Library\Models\Resource;

class StatisticResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $recources_count = Resource::query()->count();
            $fiction_count  = Resource::query()->where('type', 'Китобҳои бадеӣ')->count();
            $textbooks_count = Resource::query()->where('type', 'Китобҳои дарсӣ')->count();
            $video_lessons_count = Resource::query()->where('type', 'Дарсҳои видеоӣ')->count();
            $practical_virtual_lessons_count = Resource::query()->where('type', 'Дарсҳои амалии виртуалӣ')->count();
            $interactive_books_count = Resource::query()->where('type', 'Китобҳои интерактивӣ')->count();
            $demonstrations_count = Resource::query()->where('type', 'Намоишномаҳо')->count();
            $industry_materials_count = Resource::query()->where('type', 'Маводҳои соҳавӣ')->count();
            $additional_course_materials_count = Resource::query()->where('type', 'Маводҳои дарсҳои иловагӣ')->count();
            $teacher_training_materials_count = Resource::query()->where('type', 'Маводҳои такмили ихтисоси омӯзгорон')->count();
            $audio_materials_count = Resource::query()->where('type', 'Маводҳои аудиоӣ')->count();

            return Inertia::render('Statistic/Index', compact([
                'recources_count',
                'fiction_count',
                'textbooks_count',
                'video_lessons_count',
                'practical_virtual_lessons_count',
                'interactive_books_count',
                'demonstrations_count',
                'industry_materials_count',
                'additional_course_materials_count',
                'teacher_training_materials_count',
                'audio_materials_count'
            ]));


    }

}
