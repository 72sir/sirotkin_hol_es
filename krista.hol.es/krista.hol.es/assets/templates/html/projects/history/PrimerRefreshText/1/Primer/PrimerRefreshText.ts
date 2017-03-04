declare module WebReports.Model.Primer {
    export interface PrimerRefreshText extends Control {
        /** Заголовок легенды. */
        title: Text;
        /** Связанные источники данных. */
        linkedDataSourcesRefs: Model.Versioning[];
        /** Источник данных. */
        dataSourceRef: Model.Versioning;

    }
}
module WebReports.Controls.Primer {
    export class PrimerRefreshText extends UIComponent {

        constructor(private model: WebReports.Model.Primer.PrimerRefreshText) {
            super();
        }

        public render(container: HTMLElement): void {
            var str = Utils.Common.getHandlebarsText.call(this, this.model.title);

            var sources =  this.model.linkedDataSourcesRefs
                ? this.model.linkedDataSourcesRefs.concat([this.model.dataSourceRef])
                : [this.model.dataSourceRef];


            if (this.model.dataSourceRef) {
                this.getDataSourceManager().subscribeOnFirstLoaded(this.getId(), sources, (success: boolean) => {
                    this.refresh(container);
                });

                // Подписываемся на обновление любого источника от которого зависит контрол
                this.getDataSourceManager().subscribeOnLoaded(this.getId(), sources, (success: boolean) => {
                    this.refresh(container);
                });
            }

        }

        public refresh(container: HTMLElement) {
            let str = Utils.Common.getHandlebarsText.call(this, this.model.title);

            $(container).append("<div class='text-control'> " + str + " </div>");

        }

    }
}
