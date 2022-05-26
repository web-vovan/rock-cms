<x-forms.input field="desc_en.{{$key}}.title" title="Заголовок (en)"/>
<x-forms.editor :model="$items[$key]['text']" field="desc_en.{{$key}}.text" title="Описание"/>
