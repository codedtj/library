<template>
    <div class="dropdown">
        <input @click.stop.prevent.capture
               @keydown="onKeyDown"
               autocomplete="off"
               class="form-control col-md-12"
               data-toggle="dropdown"
               :id="queryInputId"
               name="query"
               type="text"
               v-bind:placeholder="placeholder"
               v-model="query"
               :class="{'is-invalid': isInvalid, 'form-control-sm': size === 'sm'}"
               v-on:blur="hideDropdown" v-on:focus="showDropdown"
               v-on:input="onInputChanged">
        <div :class="{show: showOptions && options.length > 0}"
             class="dropdown-menu"
             id="optionsMenu">
            <div :class="{active: index === activeOptionIndex}"
                 @click.stop.prevent="onOptionSelected(option)"
                 class="dropdown-item"
                 v-bind:property="option"
                 v-for="(option, index) in options"
                 :key="option[keyPropertyName]">
                {{ formatOptions(option) }}
            </div>
        </div>
    </div>
</template>

<script>

import {generateId} from "@/Util/stringHelper";

const CancelToken = axios.CancelToken;
let source;

export default {
    created() {
        if (this.providedQuery) {
            this.query = this.providedQuery;
        }

        if (this.providedOptions)
            this.options = this.providedOptions;

        if (this.actionUrl)
            this.fetchData();
    },
    props: {
        providedOptions: {
            type: Array,
            required: false
        },
        size:String,
        actionUrl: String,
        placeholder: String,
        displayPropertyName: String,
        searchPropertyName: String,
        keyPropertyName: {
            type: String,
            default: 'id'
        },
        isInvalid: {
            required: false,
            default: false
        },
        searchInputChange: {
            type: Function,
            required: false
        },
        optionFormatter: {
            type: Function
        },
        providedQuery: {
            type: String,
            required: false
        },
        queryIsFirstOption: {
            type: Boolean,
            default: false
        },
        preventFetching: {
            default: 0
        }
    },
    data() {
        return {
            query: '',
            queryInputId: generateId(),
            options: [],
            activeOptionIndex: 0,
            showOptions: false
        }
    },
    watch: {
        providedQuery() {
            this.query = this.providedQuery;
        },
        providedOptions() {
            this.options = this.providedOptions
        },
        query() {
            if (this.actionUrl)
                this.fetchData();
            else
                this.filterData();
        }
    },
    methods: {
        onInputChanged() {
            if (this.searchInputChange)
                this.searchInputChange(this.query);
            this.activeOptionIndex = 0
        },
        onOptionSelected(option) {
            this.hideDropdown();

            if (this.options.length > 0) {
                if (!option) {
                    option = this.options.find((item, index) => {
                        return index === this.activeOptionIndex
                    })
                }
                if (!option) {
                    option = this.options[0];
                    this.activeOptionIndex = 0;
                } else
                    this.query = option[this.displayPropertyName];

                this.$emit('selected', option);
            }

            if (!option)
                this.$emit('notfound', this.query)

            if (this.searchInputChange)
                this.searchInputChange(this.query);

            document.getElementById(this.queryInputId).blur();
        }
        ,
        onKeyDown(e) {
            switch (e.keyCode) {
                case 40:
                    e.preventDefault();
                    this.setActiveItem('down');
                    break;
                case 38:
                    e.preventDefault();
                    this.setActiveItem('up');
                    break;
                case 13: //enter
                    e.preventDefault();
                    this.onOptionSelected(null);
                    break;
                default:
                    return true
            }
        }
        ,

        setActiveItem(direction) {
            let newActiveIndex = this.activeOptionIndex;
            if (direction === 'down') newActiveIndex++;
            else newActiveIndex--;

            if (newActiveIndex < 0)
                newActiveIndex = this.options.length - 1;
            if (newActiveIndex >= this.options.length)
                newActiveIndex = 0;
            this.activeOptionIndex = newActiveIndex
        }
        ,
        showDropdown() {
            this.showOptions = true
        }
        ,
        hideDropdown() {
            let self = this;
            setTimeout(function () {
                self.showOptions = false;
            }, 150);
        }
        ,
        fetchData() {
            if (this.preventFetching > 0) {
                this.preventFetching--;
                return;
            }
            // if (source) {
            //     source.cancel();
            // }
            //
            // source = CancelToken.source();

            if (this.query && this.query.length > 2)
                axios.get(this.actionUrl + this.query)
                    .then(response => this.setOptions(response.data))
                    .catch();
            else this.setOptions([])
        }
        ,
        setOptions(options) {
            if (this.queryIsFirstOption && this.query) {
                let option = {id: null};
                option[this.displayPropertyName] = this.query;
                this.options = [option, ...options];
            } else this.options = options;
        }
        ,
        filterData() {
            if (this.query) {
                this.options = this.providedOptions
                    .filter(option => option[this.searchPropertyName]
                        .replace(/[^a-zA-Zа-яА-ЯЁё]/g, '')
                        .toUpperCase()
                        .includes(this.query.replace(/[^a-zA-Zа-яА-ЯЁё]/g, '').toUpperCase())
                    )
            } else {
                this.options = this.providedOptions;
            }
        }
        ,
        formatOptions(option) {
            if (this.optionFormatter)
                return this.optionFormatter(option);
            else
                return option[this.displayPropertyName];
        }
    }
}
</script>

<style>

</style>
