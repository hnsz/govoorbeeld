<?php

/*
 * Copyright (C) 2017 hans-rudolf.
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 */

/**
 * Description of DefaultPageView
 *
 * @author hans-rudolf
 */
class DefaultPageView implements IView, IModelListener
{
        public $title;
        public $contents;

        public function update()
        {

                $head = include TMPLT.'/defaulthead.php';
                $body = include TMPLT.'/defaultbody.php';
                $afterscript = include TMPLT.'/afterscript.php';

                $htmldoc = include TMPLT.'/htmldoc.php';

                return $htmldoc;
        }
        public function processModelEvent(IModelEvent $modelEvent)
        {
                if ($modelEvent->name() == "ready") {
                        $data = $modelEvent->data();
                        $this->title = $data->title;
                        $this->dailyRant = $data->dailyRant;
                }
        }
}
