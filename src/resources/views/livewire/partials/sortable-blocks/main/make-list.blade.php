<x-forms.input field="make_block_list.{{$key}}.title" title="Заголовок"/>
<x-forms.input field="make_block_list.{{$key}}.link" title="Ссылка"/>
<x-forms.editor :model="$items[$key]['text']" field="make_block_list.{{$key}}.text" title="Описание"/>
