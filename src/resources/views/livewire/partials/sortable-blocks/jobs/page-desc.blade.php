<x-forms.input field="desc.{{$key}}.title" title="Заголовок"/>
<x-forms.editor :model="$items[$key]['text']" field="desc.{{$key}}.text" title="Описание"/>
