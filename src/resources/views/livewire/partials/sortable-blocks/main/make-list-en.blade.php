<x-forms.input field="make_block_list_en.{{$key}}.title" title="Заголовок (en)"/>
<x-forms.input field="make_block_list_en.{{$key}}.link" title="Ссылка (en)"/>
<x-forms.editor :model="$items[$key]['text']" field="make_block_list_en.{{$key}}.text" title="Описание (en)"/>
