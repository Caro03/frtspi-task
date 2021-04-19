<?php

namespace modules\statik\controllers;

use Craft;
use craft\elements\Entry;
use yii\web\Response;
use craft\web\Controller;

class FormController extends Controller {

    public function actionSave() {
        
        $form = Craft::$app->request->getBodyParam('fields');
        $sectionId = Craft::$app->sections->getSectionByHandle('detailExpert')->id;
        $typeId = Craft::$app->sections->getEntryTypesByHandle('detailExpert')[0]->id;
        $entry = new Entry();
        $entry->sectionId = $sectionId;
        $entry->typeId = $typeId;
        $entry->enabled = false;
        $entry->setFieldValue('typeOrganisation', $form['typeOrganisation']);
        $entry->updateTitle();
        Craft::$app->elements->saveElement($entry);
        //dd($entry);
        return $this->redirect('suggest/question2?id=' . $entry->id);
}

    public function actionSaving() {
        $form = Craft::$app->request->getBodyParam('fields');
        $entryId = Craft::$app->request->getBodyParam('entryId');
        //dd($entryId);
        $entry = Entry::find()->id($entryId)->anyStatus()->one();
        //dd($entry);
        $entry->setFieldValue('organisationName', $form['organisationName']);
        $entry->setFieldValue('street', $form['street']);
        $entry->setFieldValue('housenumber', $form['housenumber']);
        $entry->setFieldValue('zip', $form['zip']);
        $entry->setFieldValue('city', $form['city']);
        $entry->setFieldValue('country', $form['country']);
        $entry->setFieldValue('website', $form['website']);
        $entry->setFieldValue('fullname', $form['fullname']);
        $entry->setFieldValue('email', $form['email']);
        $entry->setFieldValue('telephone', $form['telephone']);
        Craft::$app->elements->saveElement($entry);
        //dd($entry);
        return $this->redirect('suggest/question3?id=' . $entry->id);
    }

    public function actionSubmit() {
        $form = Craft::$app->request->getBodyParam('fields');
        $entryId = Craft::$app->request->getBodyParam('entryId');
        $entry = Entry::find()->id($entryId)->anyStatus()->one();
        $entry->setFieldValue('diseases', $form['diseases']);
        $entry->setFieldValue('services', $form['services']);
        $entry->setFieldValue('collaboration', $form['collaboration']);
        $entry->setFieldValue('collaborationName', $form['collaborationName']);
        $entry->setFieldValue('projects', $form['projects']);
        Craft::$app->elements->saveElement($entry);
        return $this->redirect('suggest/submit');
    }
}
