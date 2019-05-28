<template>

    <draggable v-model="myArray" draggable=".item" class="row">
            
        <div v-for="element in myArray" :key="element.id" class="item col-md-3">
            
                {{element.name}}
            
        </div>
    
    </draggable>

</template>

<script>

import draggable from 'vuedraggable'

export default {

    components: {

        draggable,
    
    },
    
    data() {
    
        return {
    
            myArray: [
    
                {name: 'asdd'},
    
                {name: 'asdasfdfd'},
    
                {name: 'azgdfgsdd'},
    
                {name: 'adfgsddf'},
    
                {name: 'dfgdfgasdd'},
    
            ]
    
        }
    
    }

}

</script>